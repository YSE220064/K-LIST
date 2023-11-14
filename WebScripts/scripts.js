function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
}

document.getElementById("list-name").addEventListener("keyup", function(event) {
    if (event.key === "Enter") {
        changeListName();
    }
});

function changeListName() {
    var listNameInput = document.getElementById("list-name");
    var listTitle = document.getElementById("list-title");
    listTitle.textContent = listNameInput.value || "K-List";
}

document.getElementById("item").addEventListener("keyup", function(event) {
    if (event.key === "Enter") {
        addItem();
    }
});

function addItem() {
    var input = document.getElementById("item");
    var itemText = input.value;

    if (itemText.trim() === "") {
        alert("商品名を記入してください！");
        return;
    }

    var list = document.getElementById("list");
    var listItem = document.createElement("li");
    listItem.innerHTML = `
        <span>${itemText}</span>
        <button onclick="removeItem(this)">削除</button>
    `;
    list.appendChild(listItem);

    input.value = "";
}

function removeItem(button) {
    var listItem = button.parentElement;
    listItem.remove();
}

function saveList() {
    var listName = document.getElementById("list-name").value || "K-List";
    var listContent = getListContentWithBullet();
    var creationDateTime = getJapaneseDateTime();

    var contentToSave = `リスト名: ${listName}\n\n${listContent}\n\n作成日時: ${creationDateTime}`;

    var blob = new Blob([contentToSave], { type: "text/plain" });
    var a = document.createElement("a");
    a.href = URL.createObjectURL(blob);
    a.download = listName + " のリスト " + creationDateTime + ".txt";
    a.click();
}

function getListContentWithBullet() {
    var listContent = "";

    var listItems = document.getElementById("list").getElementsByTagName("li");
    for (var i = 0; i < listItems.length; i++) {
        var itemText = listItems[i].querySelector("span").textContent.trim();
        listContent += `${i + 1}. ${itemText}\n`;
    }

    return listContent;
}

function getJapaneseDateTime() {
    var options = {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: 'numeric',
        minute: 'numeric',
        second: 'numeric',
        hour12: false,
        timeZone: 'Asia/Tokyo'
    };

    var japaneseDateTime = new Date().toLocaleString('ja-JP', options);
    return japaneseDateTime;
}

function copyLink() {
    var listName = encodeURIComponent(document.getElementById("list-name").value);
    var listContent = encodeURIComponent(getListContent());
    var shareLink = window.location.href.split('?')[0] + '?list=' + listName + '&items=' + listContent;
    
    navigator.clipboard.writeText(shareLink).then(function() {
        alert("リンクがコピーされました！");
    }).catch(function(err) {
        console.error('リンクがコピー出来ません！', err);
    });
}

function copyLinkAndGenerateQRCode() {
    var listName = encodeURIComponent(document.getElementById("list-name").value);
    var listContent = encodeURIComponent(getListContent());
    var shareLink = window.location.href.split('?')[0] + '?list=' + listName + '&items=' + listContent;

    // Clear existing QR code content
    document.getElementById("qrcode").innerHTML = '';

    // Generate QR code
    var qrcode = new QRCode(document.getElementById("qrcode"), {
        text: shareLink,
        width: 128,
        height: 128
    });

    navigator.clipboard.writeText(shareLink).then(function() {
        alert("リンクがコピーされて、QRコードが作成されました！");
    }).catch(function(err) {
        console.error('リンクがコピー出来ません！', err);
    });
}

function getListContent() {
    var listContent = "";

    var listItems = document.getElementById("list").getElementsByTagName("li");
    for (var i = 0; i < listItems.length; i++) {
        var itemText = listItems[i].querySelector("span").textContent.trim();
        listContent += itemText + "\n";
    }

    return listContent;
}

function populateListFromUrl() {
    var listName = decodeURIComponent(getUrlParameter('list'));
    var items = decodeURIComponent(getUrlParameter('items'));

    // Clear existing list content
    document.getElementById("list").innerHTML = "";

    if (listName) {
        document.getElementById("list-name").value = listName;
        changeListName();
    }

    if (items) {
        var itemList = items.split('\n');
        var list = document.getElementById("list");

        for (var i = 0; i < itemList.length; i++) {
            var itemText = itemList[i].trim();
            if (itemText !== "") {
                var listItem = document.createElement("li");
                listItem.innerHTML = `
                    <span>${itemText}</span>
                    <button onclick="removeItem(this)">削除</button>
                `;
                list.appendChild(listItem);
            }
        }
    }

    // Reset the numbering of list items
    resetListNumbering();
}

function resetListNumbering() {
    var listItems = document.getElementById("list").getElementsByTagName("li");

    for (var i = 0; i < listItems.length; i++) {
        var itemText = listItems[i].querySelector("span");
        itemText.textContent = itemText.textContent.replace(/^\d+\./, (i + 1) + ".");
    }
}

// Populate the list on page load
populateListFromUrl();

function savetodb() {
    var listName = document.getElementById("list-name").value || "K-List";
    var listContent = getListContentWithBullet();

    // Send data to PHP file using AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "okaimonosavetodb.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert(xhr.responseText);
        }
    };
    xhr.send("listName=" + encodeURIComponent(listName) + "&listContent=" + encodeURIComponent(listContent));
}

function displayLists() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "?displayLists=1", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var lists = JSON.parse(xhr.responseText);
            if (lists.length > 0) {
                populateTable(lists);
            } else {
                alert("No lists found");
            }
        }
    };
    xhr.send();
}

function populateTable(lists) {
    var table = document.getElementById("lists-table");
    table.innerHTML = "";

    var headerRow = table.insertRow(0);
    var headers = ["ID", "List Name", "List Content", "Creation DateTime", "Actions"];
    for (var i = 0; i < headers.length; i++) {
        var cell = headerRow.insertCell(i);
        cell.innerHTML = headers[i];
    }

    for (var i = 0; i < lists.length; i++) {
        var row = table.insertRow(i + 1);
        row.insertCell(0).innerHTML = lists[i].id;
        row.insertCell(1).innerHTML = lists[i].list_name;
        row.insertCell(2).innerHTML = lists[i].list_content;
        row.insertCell(3).innerHTML = lists[i].creation_datetime;
        var actionsCell = row.insertCell(4);
        actionsCell.innerHTML = '<button onclick="editList(' + lists[i].id + ', \'' + lists[i].list_name + '\', \'' + lists[i].list_content + '\')">Edit</button> ' +
            '<button onclick="deleteList(' + lists[i].id + ')">Delete</button>';
    }
}

function editList(id, name, content) {
    var newName = prompt("Enter new name:", name);
    var newContent = prompt("Enter new content:", content);

    if (newName !== null && newContent !== null) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert(xhr.responseText);
                displayLists();
            }
        };
        xhr.send("action=editList&listId=" + id + "&listName=" + encodeURIComponent(newName) + "&listContent=" + encodeURIComponent(newContent));
    }
}

function deleteList(id) {
    var confirmDelete = confirm("Are you sure you want to delete this list?");
    if (confirmDelete) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert(xhr.responseText);
                displayLists();
            }
        };
        xhr.send("action=deleteList&listId=" + id);
    }
}

window.onload = function () {
    displayLists();
};