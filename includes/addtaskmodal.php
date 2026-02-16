<!-- Add Task Modal (shared include) -->
<div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
		<div class="modal-content modal-app add-task-modal">
			<div class="modal-header panel-header panel-header--teal">
				<div class="d-flex align-items-center gap-2">
					<i class="bi bi-plus-lg"></i>
					<h5 class="modal-title fw-bold" id="addTaskModalLabel">Add New Task</h5>
				</div>
				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="modal-body">
				<form id="addTaskForm" class="add-task-form" action="" method="post" target="addTaskSink">
					<div class="row g-3">
						<div class="col-12">
							<label for="taskAccountName" class="form-label fw-semibold">
								Account Name <span class="text-danger">*</span>
							</label>
							<select id="taskAccountName" name="accountName" class="form-select control-app" required>
								<option value="">Select Client/Project</option>
								<option value="Acme Corporation">Acme Corporation</option>
								<option value="TechStart Inc.">TechStart Inc.</option>
								<option value="Global Solutions Ltd.">Global Solutions Ltd.</option>
								<option value="Digital Ventures">Digital Ventures</option>
								<option value="Enterprise Systems">Enterprise Systems</option>
								<option value="Innovation Labs">Innovation Labs</option>
							</select>
						</div>

						<div class="col-12">
							<label for="taskApprover" class="form-label fw-semibold">
								Select Approver <span class="text-danger">*</span>
							</label>
							<select id="taskApprover" name="approver" class="form-select control-app" required>
								<option value="">Select Supervisor</option>
								<option value="Sarah Johnson">Sarah Johnson - Senior Manager</option>
								<option value="Michael Chen">Michael Chen - Team Lead</option>
								<option value="Emily Rodriguez">Emily Rodriguez - Department Head</option>
								<option value="David Kim">David Kim - Project Director</option>
								<option value="Lisa Anderson">Lisa Anderson - Operations Manager</option>
							</select>
						</div>

						<div class="col-12">
							<label for="taskDescription" class="form-label fw-semibold">
								Task Description <span class="text-danger">*</span>
							</label>
							<textarea
								id="taskDescription"
								name="description"
								class="form-control control-app add-task-textarea"
								rows="4"
								placeholder="Provide detailed information about the task..."
								required
							></textarea>
						</div>

						<div class="col-12">
							<div class="row g-3">
								<div class="col-12 col-md-6">
									<label for="taskAvailableTime" class="form-label fw-semibold">Available Time</label>
									<input
										id="taskAvailableTime"
										type="text"
										class="form-control control-app"
										value="160:00"
										disabled
										aria-describedby="taskAvailableTimeHelp"
									/>
									<div id="taskAvailableTimeHelp" class="form-text add-task-help">Hours remaining this period</div>
								</div>

								<div class="col-12 col-md-6">
									<label class="form-label fw-semibold">
										Billed Hours <span class="text-danger">*</span>
									</label>

									<div class="add-task-time">
										<div class="add-task-time-col">
											<input
												id="taskHours"
												type="number"
												min="0"
												max="23"
												name="hours"
												class="form-control control-app text-center"
												placeholder="Hours"
												required
											/>
											<div class="form-text add-task-help text-center">Hours</div>
										</div>

										<div class="add-task-time-sep" aria-hidden="true">:</div>

										<div class="add-task-time-col">
											<input
												id="taskMinutes"
												type="number"
												min="0"
												max="59"
												name="minutes"
												class="form-control control-app text-center"
												placeholder="Min"
												required
											/>
											<div class="form-text add-task-help text-center">Minutes</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>

				<iframe title="add task submission" name="addTaskSink" class="d-none"></iframe>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-teal-app" form="addTaskForm">
					<i class="bi bi-check-circle-fill me-2"></i>
					Add Task
				</button>
			</div>
		</div>
	</div>
</div>
