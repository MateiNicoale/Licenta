<!DOCTYPE html>
<html>
  <head>
    <title>Drag and Drop</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="./src/styles.css" />
  </head>

  <style>
    body {
  font-family: sans-serif;
  background-color: #ffce00;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.app {
  display: flex;
  width: 100vw;
  height: 100vw;
  flex-flow: column;
}

header {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 60px;
}

.lists {
  display: flex;
  flex: 1;
  width: 100%;
  /* overflow-x: scroll; */
}

.lists .list {
  display: flex;
  flex-flow: column;
  flex: 1;
  width: 100%;
  min-width: 250px;
  max-width: 350px;
  height: 100%;
  min-height: 150px;
  background-color: rgba(0, 0, 0, 0.1);
  margin: 0 15px;
  padding: 8px;
  transition: all 0.2s linear;
}

.lists .list .list-item {
  background-color: #f3f3f3;
  border-radius: 8px;
  padding: 15px 20px;
  text-align: center;
  margin: 4px 0;
}

    </style>

  <body>
    <div id="app">
      <header>
        <h1>DRAG AND DROP</h1>
      </header>
      <div class="lists">
        <div class="list">
          <div class="list-item" draggable="true">List item 1</div>
          <div class="list-item" draggable="true">List item 2</div>
          <div class="list-item" draggable="true">List item 3</div>
        </div>
        <div class="list"></div>
        <div class="list"></div>
      </div>
    </div>

    <script src="src/index.js"></script>
  </body>
</html>

<script>
  const listItems = document.querySelectorAll(".list-item");
const lists = document.querySelectorAll(".list");

let draggedItem = null;

for (let i = 0; i < listItems.length; i++) {
  const item = listItems[i];

  item.addEventListener("dragstart", function () {
    draggedItem = item;
    setTimeout(() => {
      item.style.display = "none";
    }, 0);
  });

  item.addEventListener("dragend", function () {
    setTimeout(() => {
      draggedItem.style.display = "block";
      draggedItem = null;
    }, 0);
  });

  for (let j = 0; j < lists.length; j++) {
    const list = lists[j];

    list.addEventListener("dragover", function (e) {
      e.preventDefault();
    });

    list.addEventListener("dragenter", function (e) {
      e.preventDefault();
      this.style.backgroundColor = "rgba(0, 0, 0, 0.2)";
    });

    list.addEventListener("dragleave", function (e) {
      e.preventDefault();
      this.style.backgroundColor = "rgba(0, 0, 0, 0.1)";
    });

    list.addEventListener("drop", function (e) {
      this.append(draggedItem);
      this.style.backgroundColor = "rgba(0, 0, 0, 0.1)";
    });
  }
}

  </script>
