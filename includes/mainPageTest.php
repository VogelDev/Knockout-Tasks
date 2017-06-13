<div data-bind="foreach: categories" class="row" id="mainPage">
  <div class="col-sm-4 categoryList">
    <ul class="tasks">
      <li class="task">
        <div class="card">
          <div class="taskMsg">
            <div id="addCategoryBtn" data-bind="text:name"></div>
            <input id="addCategoryInput" style="display: none;" data-bind="enterkey: addTask"></input>
          </div>
          <div class="taskCompleteAdd"></div>
        </div>
      </li>
    </ul>
    <ul data-bind="foreach: tasks" class="tasks">
      <li data-bind="css:{task: true, complete: COMPLETED == 1}, click: $root.completeTask, visible: TASK != null">
        <div class="card">
          <div class="taskMsg" data-bind="text: TASK">
          </div>
          <div class="taskComplete"></div>
        </div>
      </li>
    </ul>
    <ul class="tasks" data-bind="visible: tasks.length !== 0">
      <li class="task">
        <div class="card">
          <div class="taskMsg">
            <div class="addBtn">Add task...</div>
            <input class="addInput" style="display: none;" data-bind="event: {keypress: $root.onEnter}"></input>
          </div>
          <div class="taskCompleteAdd"></div>
        </div>
      </li>
    </ul>
  </div>
</div>
