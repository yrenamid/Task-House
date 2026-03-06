<div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addTaskModalLabel">Add New Task</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form method="post" id="addTaskForm">
					<div class="mb-3">
						<label for="taskDesc" class="form-label">Task Description</label>
						<textarea class="form-control" id="taskDesc" name="task_description" rows="3" placeholder="Enter task description..." required></textarea>
					</div>
					<div class="mb-3">
						<label for="availableTime" class="form-label">Available Time</label>
						<input type="text" class="form-control" id="availableTime" value="Auto-calculated" disabled>
					</div>
					<div class="row g-3">
						<div class="col-12">
							<label class="form-label">Billed Hours</label>
						</div>
						<div class="col-6">
							<input type="number" class="form-control" name="billed_hours" min="0" placeholder="Hours">
						</div>
						<div class="col-6">
							<input type="number" class="form-control" name="billed_minutes" min="0" max="59" placeholder="Minutes">
						</div>
					</div>
					<input type="hidden" name="add_task_submit" value="1">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-primary" form="addTaskForm">Add Task</button>
			</div>
		</div>
	</div>
</div>