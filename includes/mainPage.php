<div class="container" id="mainPage">
  <div class="row">
    <div class="col-sm-6">
    </div>
    <div class="col-sm-6">
      <!-- <input type="text" id="taskInput"></input> -->
      <!-- <button data-bind="click:addTask" type="button" id="addButton" name="addButton" class="btn btn-primary" aria-label="">Add</button> -->
      <ul data-bind="foreach: tasks" class="tasks">
        <!-- <li data-bind="text: TASK, css:{task: true, complete: COMPLETED == 1}, click: $parent.completeTask"></li> -->
        <li data-bind="css:{task: true, complete: COMPLETED == 1}, click: $parent.completeTask">
          <div class="card">
            <div class="taskMsg" data-bind="text: TASK">
            </div>
            <div class="taskComplete"></div>
          </div>
        </li>
      </ul>
      <ul style="clear:both">
        <li>
          <div id="addBtn">Add...</div>
          <input id="addInput" style="display: none;" data-bind="enterkey: addTask"></input>
        </li>
      </ul>
    </div>
  </div>
</div>
