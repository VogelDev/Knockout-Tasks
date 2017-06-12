<!-- <div class="container" id="mainPage"> -->
  <div class="row" id="mainPage">
    <div class="col-sm-4">
      <ul class="tasks">
        <li class="task">
          <div class="card">
            <div class="taskMsg">
              <div id="addBtn">Category 1</div>
              <input id="addInput" style="display: none;" data-bind="enterkey: addTask"></input>
            </div>
            <div class="taskCompleteAdd"></div>
          </div>
        </li>
      </ul>
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
      <ul class="tasks">
        <li class="task">
          <div class="card">
            <div class="taskMsg">
              <div id="addBtn">Add task...</div>
              <input id="addInput" style="display: none;" data-bind="enterkey: addTask"></input>
            </div>
            <div class="taskCompleteAdd"></div>
          </div>
        </li>
      </ul>
    </div>
    <div class="col-sm-4">
      <ul class="tasks">
        <li class="task">
          <div class="card">
            <div class="taskMsg">
              <div id="addBtn">Add task...</div>
              <input id="addInput" style="display: none;" data-bind="enterkey: addTask"></input>
            </div>
            <div class="taskCompleteAdd"></div>
          </div>
        </li>
      </ul>
    </div>
    <!-- <div class="col-sm-4"></div> -->
  </div>
<!-- </div> -->
