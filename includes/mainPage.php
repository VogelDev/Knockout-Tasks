<div class="container" id="mainPage">
  <div class="row">
    <div class="col-sm-6">
    </div>
    <div class="col-sm-6">
      <!-- <input type="text" id="taskInput"></input> -->
      <!-- <button data-bind="click:addTask" type="button" id="addButton" name="addButton" class="btn btn-primary" aria-label="">Add</button> -->
      <ul data-bind="foreach: tasks">
        <li data-bind="text: TASK"></li>
      </ul>
      <ul>
        <li>
          <div id="addBtn">Add...</div>
          <input id="addInput" style="display: none;" data-bind="enterkey: addTask"></input>
        </li>
      </ul>
    </div>
  </div>
</div>
