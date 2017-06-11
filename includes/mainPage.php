<div class="container" id="mainPage">
  <div class="row">
    <div class="col-sm-6">
      <input type="text" id="taskInput"></input>
      <button data-bind="click:addTask" type="button" id="addButton" name="addButton" class="btn btn-primary" aria-label="">Add</button>
    </div>
    <div class="col-sm-6">
      <ul data-bind="foreach: tasks">
        <div data-bind="text: TASK"></div>
      </ul>
    </div>
  </div>
</div>
