@extends('layouts.main')
@section('main-section')
    @push('title')
        <title>Dashboard</title>
    @endpush


				<!-- Breadcrumb -->
				<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
					<div class="my-auto mb-2">
						<h2 class="mb-1">Admin Dashboard</h2>
						<nav>
							<ol class="breadcrumb mb-0">
								<li class="breadcrumb-item">
									<a href="index.html"><i class="ti ti-smart-home"></i></a>
								</li>
								<li class="breadcrumb-item">
									Dashboard
								</li>
								<li class="breadcrumb-item active" aria-current="page">Admin Dashboard</li>
							</ol>
						</nav>
					</div>
					<div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
						<div class="me-2 mb-2">
							<div class="dropdown">
								<a href="javascript:void(0);"
									class="dropdown-toggle btn btn-white d-inline-flex align-items-center"
									data-bs-toggle="dropdown">
									<i class="ti ti-file-export me-1"></i>Export
								</a>
								<ul class="dropdown-menu  dropdown-menu-end p-3">
									<li>
										<a href="javascript:void(0);" class="dropdown-item rounded-1"><i
												class="ti ti-file-type-pdf me-1"></i>Export as PDF</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item rounded-1"><i
												class="ti ti-file-type-xls me-1"></i>Export as Excel </a>
									</li>
								</ul>
							</div>
						</div>
						<div class="mb-2">
							<div class="input-icon w-120 position-relative">
								<span class="input-icon-addon">
									<i class="ti ti-calendar text-gray-9"></i>
								</span>
								<input type="text" class="form-control yearpicker" value="2025">
							</div>
						</div>
						<div class="ms-2 head-icons">
							<a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top"
								data-bs-original-title="Collapse" id="collapse-header">
								<i class="ti ti-chevrons-up"></i>
							</a>
						</div>
					</div>
				</div>
				<!-- /Breadcrumb -->

				<!-- Welcome Wrap -->
				<div class="card border-0">
					<div class="card-body d-flex align-items-center justify-content-between flex-wrap pb-1">
						<div class="d-flex align-items-center mb-3">
							<span class="avatar avatar-xl flex-shrink-0">
								<img src="images/avatar-31.jpg" class="rounded-circle" alt="img">
							</span>
							<div class="ms-3">
								<h3 class="mb-2">Welcome Back, Adrian <a href="javascript:void(0);" class="edit-icon"><i
											class="ti ti-edit fs-14"></i></a></h3>
								<p>You have <span class="text-primary text-decoration-underline">21</span> Pending
									Approvals & <span class="text-primary text-decoration-underline">14</span> Leave
									Requests</p>
							</div>
						</div>
						<div class="d-flex align-items-center flex-wrap mb-1">
							<a href="#" class="btn btn-secondary btn-md me-2 mb-2" data-bs-toggle="modal"
								data-bs-target="#add_project"><i class="ti ti-square-rounded-plus me-1"></i>Add
								Project</a>
							<a href="#" class="btn btn-primary btn-md mb-2" data-bs-toggle="modal"
								data-bs-target="#add_leaves"><i class="ti ti-square-rounded-plus me-1"></i>Add
								Requests</a>
						</div>
					</div>
				</div>
				<!-- /Welcome Wrap -->

				<div class="row">

					<!-- Widget Info -->
					<div class="col-xxl-8 d-flex">
						<div class="row flex-fill">
							<div class="col-md-3 d-flex">
								<div class="card flex-fill">
									<div class="card-body">
										<span class="avatar rounded-circle bg-primary mb-2">
											<i class="ti ti-calendar-share fs-16"></i>
										</span>
										<h6 class="fs-13 fw-medium text-default mb-1">Attendance Overview</h6>
										<h3 class="mb-3">120/154 <span class="fs-12 fw-medium text-success"><i
													class="fa-solid fa-caret-up me-1"></i>+2.1%</span></h3>
										<a href="attendance-employee.html" class="link-default">View Details</a>
									</div>
								</div>
							</div>
							<div class="col-md-3 d-flex">
								<div class="card flex-fill">
									<div class="card-body">
										<span class="avatar rounded-circle bg-secondary mb-2">
											<i class="ti ti-browser fs-16"></i>
										</span>
										<h6 class="fs-13 fw-medium text-default mb-1">Total No of Project's</h6>
										<h3 class="mb-3">90/125 <span class="fs-12 fw-medium text-danger"><i
													class="fa-solid fa-caret-down me-1"></i>-2.1%</span></h3>
										<a href="projects.html" class="link-default">View All</a>
									</div>
								</div>
							</div>
							<div class="col-md-3 d-flex">
								<div class="card flex-fill">
									<div class="card-body">
										<span class="avatar rounded-circle bg-info mb-2">
											<i class="ti ti-users-group fs-16"></i>
										</span>
										<h6 class="fs-13 fw-medium text-default mb-1">Total No of Clients</h6>
										<h3 class="mb-3">69/86 <span class="fs-12 fw-medium text-danger"><i
													class="fa-solid fa-caret-down me-1"></i>-11.2%</span></h3>
										<a href="clients.html" class="link-default">View All</a>
									</div>
								</div>
							</div>
							<div class="col-md-3 d-flex">
								<div class="card flex-fill">
									<div class="card-body">
										<span class="avatar rounded-circle bg-pink mb-2">
											<i class="ti ti-checklist fs-16"></i>
										</span>
										<h6 class="fs-13 fw-medium text-default mb-1">Total No of Tasks</h6>
										<h3 class="mb-3">225/28 <span class="fs-12 fw-medium text-success"><i
													class="fa-solid fa-caret-down me-1"></i>+11.2%</span></h3>
										<a href="tasks.html" class="link-default">View All</a>
									</div>
								</div>
							</div>
							<div class="col-md-3 d-flex">
								<div class="card flex-fill">
									<div class="card-body">
										<span class="avatar rounded-circle bg-purple mb-2">
											<i class="ti ti-moneybag fs-16"></i>
										</span>
										<h6 class="fs-13 fw-medium text-default mb-1">Earnings</h6>
										<h3 class="mb-3">$21445 <span class="fs-12 fw-medium text-success"><i
													class="fa-solid fa-caret-up me-1"></i>+10.2%</span></h3>
										<a href="expenses.html" class="link-default">View All</a>
									</div>
								</div>
							</div>
							<div class="col-md-3 d-flex">
								<div class="card flex-fill">
									<div class="card-body">
										<span class="avatar rounded-circle bg-danger mb-2">
											<i class="ti ti-browser fs-16"></i>
										</span>
										<h6 class="fs-13 fw-medium text-default mb-1">Profit This Week</h6>
										<h3 class="mb-3">$5,544 <span class="fs-12 fw-medium text-success"><i
													class="fa-solid fa-caret-up me-1"></i>+2.1%</span></h3>
										<a href="purchase-transaction.html" class="link-default">View All</a>
									</div>
								</div>
							</div>
							<div class="col-md-3 d-flex">
								<div class="card flex-fill">
									<div class="card-body">
										<span class="avatar rounded-circle bg-success mb-2">
											<i class="ti ti-users-group fs-16"></i>
										</span>
										<h6 class="fs-13 fw-medium text-default mb-1">Job Applicants</h6>
										<h3 class="mb-3">98 <span class="fs-12 fw-medium text-success"><i
													class="fa-solid fa-caret-up me-1"></i>+2.1%</span></h3>
										<a href="job-list.html" class="link-default">View All</a>
									</div>
								</div>
							</div>
							<div class="col-md-3 d-flex">
								<div class="card flex-fill">
									<div class="card-body">
										<span class="avatar rounded-circle bg-dark mb-2">
											<i class="ti ti-user-star fs-16"></i>
										</span>
										<h6 class="fs-13 fw-medium text-default mb-1">New Hire</h6>
										<h3 class="mb-3">45/48 <span class="fs-12 fw-medium text-danger"><i
													class="fa-solid fa-caret-down me-1"></i>-11.2%</span></h3>
										<a href="candidates.html" class="link-default">View All</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Widget Info -->

					<!-- Employees By Department -->
					<div class="col-xxl-4 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Employees By Department</h5>
								<div class="dropdown mb-2">
									<a href="javascript:void(0);"
										class="btn btn-white border btn-sm d-inline-flex align-items-center"
										data-bs-toggle="dropdown">
										<i class="ti ti-calendar me-1"></i>This Week
									</a>
									<ul class="dropdown-menu  dropdown-menu-end p-3">
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">This Month</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">This Week</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">Last Week</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="card-body">
								<div id="emp-department"></div>
								<p class="fs-13"><i class="ti ti-circle-filled me-2 fs-8 text-primary"></i>No of
									Employees increased by <span class="text-success fw-bold">+20%</span> from last Week
								</p>
							</div>
						</div>
					</div>
					<!-- /Employees By Department -->

				</div>

				<div class="row">

					<!-- Total Employee -->
					<div class="col-xxl-4 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Employee Status</h5>
								<div class="dropdown mb-2">
									<a href="javascript:void(0);"
										class="btn btn-white border btn-sm d-inline-flex align-items-center"
										data-bs-toggle="dropdown">
										<i class="ti ti-calendar me-1"></i>This Week
									</a>
									<ul class="dropdown-menu  dropdown-menu-end p-3">
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">This Month</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">This Week</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">Today</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between mb-1">
									<p class="fs-13 mb-3">Total Employee</p>
									<h3 class="mb-3">154</h3>
								</div>
								<div class="progress-stacked emp-stack mb-3">
									<div class="progress" role="progressbar" aria-label="Segment one" aria-valuenow="15"
										aria-valuemin="0" aria-valuemax="100" style="width: 40%">
										<div class="progress-bar bg-warning"></div>
									</div>
									<div class="progress" role="progressbar" aria-label="Segment two" aria-valuenow="30"
										aria-valuemin="0" aria-valuemax="100" style="width: 20%">
										<div class="progress-bar bg-secondary"></div>
									</div>
									<div class="progress" role="progressbar" aria-label="Segment three"
										aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
										<div class="progress-bar bg-danger"></div>
									</div>
									<div class="progress" role="progressbar" aria-label="Segment four"
										aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
										<div class="progress-bar bg-pink"></div>
									</div>
								</div>
								<div class="border mb-3">
									<div class="row gx-0">
										<div class="col-6">
											<div class="p-2 flex-fill border-end border-bottom">
												<p class="fs-13 mb-2"><i
														class="ti ti-square-filled text-primary fs-12 me-2"></i>Fulltime
													<span class="text-gray-9">(48%)</span></p>
												<h2 class="display-1">112</h2>
											</div>
										</div>
										<div class="col-6">
											<div class="p-2 flex-fill border-bottom text-end">
												<p class="fs-13 mb-2"><i
														class="ti ti-square-filled me-2 text-secondary fs-12"></i>Contract
													<span class="text-gray-9">(20%)</span></p>
												<h2 class="display-1">112</h2>
											</div>
										</div>
										<div class="col-6">
											<div class="p-2 flex-fill border-end">
												<p class="fs-13 mb-2"><i
														class="ti ti-square-filled me-2 text-danger fs-12"></i>Probation
													<span class="text-gray-9">(22%)</span></p>
												<h2 class="display-1">12</h2>
											</div>
										</div>
										<div class="col-6">
											<div class="p-2 flex-fill text-end">
												<p class="fs-13 mb-2"><i
														class="ti ti-square-filled text-pink me-2 fs-12"></i>WFH <span
														class="text-gray-9">(20%)</span></p>
												<h2 class="display-1">04</h2>
											</div>
										</div>
									</div>
								</div>
								<h6 class="mb-2">Top Performer</h6>
								<div
									class="p-2 d-flex align-items-center justify-content-between border border-primary bg-primary-100 br-5 mb-4">
									<div class="d-flex align-items-center overflow-hidden">
										<span class="me-2">
											<i class="ti ti-award-filled text-primary fs-24"></i>
										</span>
										<a href="employee-details.html" class="avatar avatar-md me-2">
											<img src="images/avatar-24.jpg" class="rounded-circle border border-white"
												alt="img">
										</a>
										<div>
											<h6 class="text-truncate mb-1 fs-14 fw-medium"><a
													href="employee-details.html">Daniel Esbella</a></h6>
											<p class="fs-13">IOS Developer</p>
										</div>
									</div>
									<div class="text-end">
										<p class="fs-13 mb-1">Performance</p>
										<h5 class="text-primary">99%</h5>
									</div>
								</div>
								<a href="employees.html" class="btn btn-light btn-md w-100">View All Employees</a>
							</div>
						</div>
					</div>
					<!-- /Total Employee -->

					<!-- Attendance Overview -->
					<div class="col-xxl-4 col-xl-6 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Attendance Overview</h5>
								<div class="dropdown mb-2">
									<a href="javascript:void(0);"
										class="btn btn-white border btn-sm d-inline-flex align-items-center"
										data-bs-toggle="dropdown">
										<i class="ti ti-calendar me-1"></i>Today
									</a>
									<ul class="dropdown-menu  dropdown-menu-end p-3">
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">This Month</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">This Week</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">Today</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="card-body">
								<div class="chartjs-wrapper-demo position-relative mb-4">
									<canvas id="attendance" height="200"></canvas>
									<div class="position-absolute text-center attendance-canvas">
										<p class="fs-13 mb-1">Total Attendance</p>
										<h3>120</h3>
									</div>
								</div>
								<h6 class="mb-3">Status</h6>
								<div class="d-flex align-items-center justify-content-between">
									<p class="f-13 mb-2"><i class="ti ti-circle-filled text-success me-1"></i>Present
									</p>
									<p class="f-13 fw-medium text-gray-9 mb-2">59%</p>
								</div>
								<div class="d-flex align-items-center justify-content-between">
									<p class="f-13 mb-2"><i class="ti ti-circle-filled text-secondary me-1"></i>Late</p>
									<p class="f-13 fw-medium text-gray-9 mb-2">21%</p>
								</div>
								<div class="d-flex align-items-center justify-content-between">
									<p class="f-13 mb-2"><i class="ti ti-circle-filled text-warning me-1"></i>Permission
									</p>
									<p class="f-13 fw-medium text-gray-9 mb-2">2%</p>
								</div>
								<div class="d-flex align-items-center justify-content-between mb-2">
									<p class="f-13 mb-2"><i class="ti ti-circle-filled text-danger me-1"></i>Absent</p>
									<p class="f-13 fw-medium text-gray-9 mb-2">15%</p>
								</div>
								<div
									class="bg-light br-5 box-shadow-xs p-2 pb-0 d-flex align-items-center justify-content-between flex-wrap">
									<div class="d-flex align-items-center">
										<p class="mb-2 me-2">Total Absenties</p>
										<div class="avatar-list-stacked avatar-group-sm mb-2">
											<span class="avatar avatar-rounded">
												<img class="border border-white" src="images/avatar-27.jpg" alt="img">
											</span>
											<span class="avatar avatar-rounded">
												<img class="border border-white" src="images/avatar-30.jpg" alt="img">
											</span>
											<span class="avatar avatar-rounded">
												<img src="images/avatar-14.jpg" alt="img">
											</span>
											<span class="avatar avatar-rounded">
												<img src="images/avatar-29.jpg" alt="img">
											</span>
											<a class="avatar bg-primary avatar-rounded text-fixed-white fs-10"
												href="javascript:void(0);">
												+1
											</a>
										</div>
									</div>
									<a href="leaves.html" class="fs-13 link-primary text-decoration-underline mb-2">View
										Details</a>
								</div>
							</div>
						</div>
					</div>
					<!-- /Attendance Overview -->

					<!-- Clock-In/Out -->
					<div class="col-xxl-4 col-xl-6 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Clock-In/Out</h5>
								<div class="d-flex align-items-center">
									<div class="dropdown mb-2">
										<a href="javascript:void(0);"
											class="dropdown-toggle btn btn-white btn-sm d-inline-flex align-items-center border-0 fs-13 me-2"
											data-bs-toggle="dropdown">
											All Departments
										</a>
										<ul class="dropdown-menu  dropdown-menu-end p-3">
											<li>
												<a href="javascript:void(0);"
													class="dropdown-item rounded-1">Finance</a>
											</li>
											<li>
												<a href="javascript:void(0);"
													class="dropdown-item rounded-1">Development</a>
											</li>
											<li>
												<a href="javascript:void(0);"
													class="dropdown-item rounded-1">Marketing</a>
											</li>
										</ul>
									</div>
									<div class="dropdown mb-2">
										<a href="javascript:void(0);"
											class="btn btn-white border btn-sm d-inline-flex align-items-center"
											data-bs-toggle="dropdown">
											<i class="ti ti-calendar me-1"></i>Today
										</a>
										<ul class="dropdown-menu  dropdown-menu-end p-3">
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">This
													Month</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">This
													Week</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">Today</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div>
									<div
										class="d-flex align-items-center justify-content-between mb-3 p-2 border border-dashed br-5">
										<div class="d-flex align-items-center">
											<a href="javascript:void(0);" class="avatar flex-shrink-0">
												<img src="images/avatar-24.jpg" class="rounded-circle border border-2"
													alt="img">
											</a>
											<div class="ms-2">
												<h6 class="fs-14 fw-medium text-truncate">Daniel Esbella</h6>
												<p class="fs-13">UI/UX Designer</p>
											</div>
										</div>
										<div class="d-flex align-items-center">
											<a href="javascript:void(0);" class="link-default me-2"><i
													class="ti ti-clock-share"></i></a>
											<span
												class="fs-10 fw-medium d-inline-flex align-items-center badge badge-success"><i
													class="ti ti-circle-filled fs-5 me-1"></i>09:15</span>
										</div>
									</div>
									<div class="d-flex align-items-center justify-content-between mb-3 p-2 border br-5">
										<div class="d-flex align-items-center">
											<a href="javascript:void(0);" class="avatar flex-shrink-0">
												<img src="images/avatar-23.jpg" class="rounded-circle border border-2"
													alt="img">
											</a>
											<div class="ms-2">
												<h6 class="fs-14 fw-medium">Doglas Martini</h6>
												<p class="fs-13">Project Manager</p>
											</div>
										</div>
										<div class="d-flex align-items-center">
											<a href="javascript:void(0);" class="link-default me-2"><i
													class="ti ti-clock-share"></i></a>
											<span
												class="fs-10 fw-medium d-inline-flex align-items-center badge badge-success"><i
													class="ti ti-circle-filled fs-5 me-1"></i>09:36</span>
										</div>
									</div>
									<div class="mb-3 p-2 border br-5">
										<div class="d-flex align-items-center justify-content-between">
											<div class="d-flex align-items-center">
												<a href="javascript:void(0);" class="avatar flex-shrink-0">
													<img src="images/avatar-27.jpg"
														class="rounded-circle border border-2" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fs-14 fw-medium text-truncate">Brian Villalobos</h6>
													<p class="fs-13">PHP Developer</p>
												</div>
											</div>
											<div class="d-flex align-items-center">
												<a href="javascript:void(0);" class="link-default me-2"><i
														class="ti ti-clock-share"></i></a>
												<span
													class="fs-10 fw-medium d-inline-flex align-items-center badge badge-success"><i
														class="ti ti-circle-filled fs-5 me-1"></i>09:15</span>
											</div>
										</div>
										<div
											class="d-flex align-items-center justify-content-between flex-wrap mt-2 border br-5 p-2 pb-0">
											<div>
												<p class="mb-1 d-inline-flex align-items-center"><i
														class="ti ti-circle-filled text-success fs-5 me-1"></i>Clock In
												</p>
												<h6 class="fs-13 fw-normal mb-2">10:30 AM</h6>
											</div>
											<div>
												<p class="mb-1 d-inline-flex align-items-center"><i
														class="ti ti-circle-filled text-danger fs-5 me-1"></i>Clock Out
												</p>
												<h6 class="fs-13 fw-normal mb-2">09:45 AM</h6>
											</div>
											<div>
												<p class="mb-1 d-inline-flex align-items-center"><i
														class="ti ti-circle-filled text-warning fs-5 me-1"></i>Production
												</p>
												<h6 class="fs-13 fw-normal mb-2">09:21 Hrs</h6>
											</div>
										</div>
									</div>
								</div>
								<h6 class="mb-2">Late</h6>
								<div
									class="d-flex align-items-center justify-content-between mb-3 p-2 border border-dashed br-5">
									<div class="d-flex align-items-center">
										<span class="avatar flex-shrink-0">
											<img src="images/avatar-29.jpg" class="rounded-circle border border-2"
												alt="img">
										</span>
										<div class="ms-2">
											<h6 class="fs-14 fw-medium text-truncate">Anthony Lewis <span
													class="fs-10 fw-medium d-inline-flex align-items-center badge badge-success"><i
														class="ti ti-clock-hour-11 me-1"></i>30 Min</span></h6>
											<p class="fs-13">Marketing Head</p>
										</div>
									</div>
									<div class="d-flex align-items-center">
										<a href="javascript:void(0);" class="link-default me-2"><i
												class="ti ti-clock-share"></i></a>
										<span
											class="fs-10 fw-medium d-inline-flex align-items-center badge badge-danger"><i
												class="ti ti-circle-filled fs-5 me-1"></i>08:35</span>
									</div>
								</div>
								<a href="attendance-report.html" class="btn btn-light btn-md w-100">View All
									Attendance</a>
							</div>
						</div>
					</div>
					<!-- /Clock-In/Out -->

				</div>

				<div class="row">

					<!-- Jobs Applicants -->
					<div class="col-xxl-4 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Jobs Applicants</h5>
								<a href="job-list.html" class="btn btn-light btn-md mb-2">View All</a>
							</div>
							<div class="card-body">
								<ul class="nav nav-tabs tab-style-1 nav-justified d-sm-flex d-block p-0 mb-4"
									role="tablist">
									<li class="nav-item" role="presentation">
										<a class="nav-link fw-medium" data-bs-toggle="tab" data-bs-target="#openings"
											aria-current="page" href="#openings" aria-selected="true"
											role="tab">Openings</a>
									</li>
									<li class="nav-item" role="presentation">
										<a class="nav-link fw-medium active" data-bs-toggle="tab"
											data-bs-target="#applicants" href="#applicants" aria-selected="false"
											tabindex="-1" role="tab">Applicants</a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade" id="openings">
										<div class="d-flex align-items-center justify-content-between mb-4">
											<div class="d-flex align-items-center">
												<a href="#" class="avatar overflow-hidden flex-shrink-0 bg-gray-100">
													<img src="images/apple.svg"
														class="img-fluid rounded-circle w-auto h-auto" alt="img">
												</a>
												<div class="ms-2 overflow-hidden">
													<p class="text-dark fw-medium text-truncate mb-0"><a
															href="javascript:void(0);">Senior IOS Developer</a></p>
													<span class="fs-12">No of Openings : 25 </span>
												</div>
											</div>
											<a href="javascript:void(0);"
												class="btn btn-light btn-sm p-0 btn-icon d-flex align-items-center justify-content-center"><i
													class="ti ti-edit"></i></a>
										</div>
										<div class="d-flex align-items-center justify-content-between mb-4">
											<div class="d-flex align-items-center">
												<a href="#" class="avatar overflow-hidden flex-shrink-0 bg-gray-100">
													<img src="images/php.svg" class="img-fluid w-auto h-auto" alt="img">
												</a>
												<div class="ms-2 overflow-hidden">
													<p class="text-dark fw-medium text-truncate mb-0"><a
															href="javascript:void(0);">Junior PHP Developer</a></p>
													<span class="fs-12">No of Openings : 20 </span>
												</div>
											</div>
											<a href="javascript:void(0);"
												class="btn btn-light btn-sm p-0 btn-icon d-flex align-items-center justify-content-center"><i
													class="ti ti-edit"></i></a>
										</div>
										<div class="d-flex align-items-center justify-content-between mb-4">
											<div class="d-flex align-items-center">
												<a href="#" class="avatar overflow-hidden flex-shrink-0 bg-gray-100">
													<img src="images/react.svg" class="img-fluid w-auto h-auto"
														alt="img">
												</a>
												<div class="ms-2 overflow-hidden">
													<p class="text-dark fw-medium text-truncate mb-0"><a
															href="javascript:void(0);">Junior React Developer </a></p>
													<span class="fs-12">No of Openings : 30 </span>
												</div>
											</div>
											<a href="javascript:void(0);"
												class="btn btn-light btn-sm p-0 btn-icon d-flex align-items-center justify-content-center"><i
													class="ti ti-edit"></i></a>
										</div>
										<div class="d-flex align-items-center justify-content-between mb-0">
											<div class="d-flex align-items-center">
												<a href="#" class="avatar overflow-hidden flex-shrink-0 bg-gray-100">
													<img src="images/laravel-icon.svg" class="img-fluid w-auto h-auto"
														alt="img">
												</a>
												<div class="ms-2 overflow-hidden">
													<p class="text-dark fw-medium text-truncate mb-0"><a
															href="javascript:void(0);">Senior Laravel Developer</a></p>
													<span class="fs-12">No of Openings : 40 </span>
												</div>
											</div>
											<a href="javascript:void(0);"
												class="btn btn-light btn-sm p-0 btn-icon d-flex align-items-center justify-content-center"><i
													class="ti ti-edit"></i></a>
										</div>
									</div>
									<div class="tab-pane fade show active" id="applicants">
										<div class="d-flex align-items-center justify-content-between mb-4">
											<div class="d-flex align-items-center">
												<a href="#" class="avatar overflow-hidden flex-shrink-0">
													<img src="images/user-09.jpg" class="img-fluid rounded-circle"
														alt="img">
												</a>
												<div class="ms-2 overflow-hidden">
													<p class="text-dark fw-medium text-truncate mb-0"><a href="#">Brian
															Villalobos</a></p>
													<span class="fs-13 d-inline-flex align-items-center">Exp : 5+
														Years<i
															class="ti ti-circle-filled fs-4 mx-2 text-primary"></i>USA</span>
												</div>
											</div>
											<span class="badge badge-secondary badge-xs">UI/UX Designer</span>
										</div>
										<div class="d-flex align-items-center justify-content-between mb-4">
											<div class="d-flex align-items-center">
												<a href="#" class="avatar overflow-hidden flex-shrink-0">
													<img src="images/user-32.jpg" class="img-fluid rounded-circle"
														alt="img">
												</a>
												<div class="ms-2 overflow-hidden">
													<p class="text-dark fw-medium text-truncate mb-0"><a
															href="#">Anthony Lewis</a></p>
													<span class="fs-13 d-inline-flex align-items-center">Exp : 4+
														Years<i
															class="ti ti-circle-filled fs-4 mx-2 text-primary"></i>USA</span>
												</div>
											</div>
											<span class="badge badge-info badge-xs">Python Developer</span>
										</div>
										<div class="d-flex align-items-center justify-content-between mb-4">
											<div class="d-flex align-items-center">
												<a href="#" class="avatar overflow-hidden flex-shrink-0">
													<img src="images/user-32.jpg" class="img-fluid rounded-circle"
														alt="img">
												</a>
												<div class="ms-2 overflow-hidden">
													<p class="text-dark fw-medium text-truncate mb-0"><a
															href="#">Stephan Peralt</a></p>
													<span class="fs-13 d-inline-flex align-items-center">Exp : 6+
														Years<i
															class="ti ti-circle-filled fs-4 mx-2 text-primary"></i>USA</span>
												</div>
											</div>
											<span class="badge badge-pink badge-xs">Android Developer</span>
										</div>
										<div class="d-flex align-items-center justify-content-between mb-0">
											<div class="d-flex align-items-center">
												<a href="javascript:void(0);"
													class="avatar overflow-hidden flex-shrink-0">
													<img src="images/user-34.jpg" class="img-fluid rounded-circle"
														alt="img">
												</a>
												<div class="ms-2 overflow-hidden">
													<p class="text-dark fw-medium text-truncate mb-0"><a
															href="javascript:void(0);">Doglas Martini</a></p>
													<span class="fs-13 d-inline-flex align-items-center">Exp : 2+
														Years<i
															class="ti ti-circle-filled fs-4 mx-2 text-primary"></i>USA</span>
												</div>
											</div>
											<span class="badge badge-purple badge-xs">React Developer</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Jobs Applicants -->

					<!-- Employees -->
					<div class="col-xxl-4 col-xl-6 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Employees</h5>
								<a href="employees.html" class="btn btn-light btn-md mb-2">View All</a>
							</div>
							<div class="card-body p-0">
								<div class="table-responsive">
									<table class="table table-nowrap mb-0">
										<thead>
											<tr>
												<th>Name</th>
												<th>Department</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<a href="javascript:void(0);" class="avatar">
															<img src="images/user-32.jpg"
																class="img-fluid rounded-circle" alt="img">
														</a>
														<div class="ms-2">
															<h6 class="fw-medium"><a href="javascript:void(0);">Anthony
																	Lewis</a></h6>
															<span class="fs-12">Finance</span>
														</div>
													</div>
												</td>
												<td>
													<span class="badge badge-secondary-transparent badge-xs">
														Finance
													</span>
												</td>
											</tr>
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<a href="#" class="avatar">
															<img src="images/user-09.jpg"
																class="img-fluid rounded-circle" alt="img">
														</a>
														<div class="ms-2">
															<h6 class="fw-medium"><a href="#">Brian Villalobos</a></h6>
															<span class="fs-12">PHP Developer</span>
														</div>
													</div>
												</td>
												<td>
													<span
														class="badge badge-danger-transparent badge-xs">Development</span>
												</td>
											</tr>
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<a href="#" class="avatar">
															<img src="images/user-01.jpg"
																class="img-fluid rounded-circle" alt="img">
														</a>
														<div class="ms-2">
															<h6 class="fw-medium"><a href="#">Stephan Peralt</a></h6>
															<span class="fs-12">Executive</span>
														</div>
													</div>
												</td>
												<td>
													<span class="badge badge-info-transparent badge-xs">Marketing</span>
												</td>
											</tr>
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<a href="javascript:void(0);" class="avatar">
															<img src="images/user-34.jpg"
																class="img-fluid rounded-circle" alt="img">
														</a>
														<div class="ms-2">
															<h6 class="fw-medium"><a href="javascript:void(0);">Doglas
																	Martini</a></h6>
															<span class="fs-12">Project Manager</span>
														</div>
													</div>
												</td>
												<td>
													<span class="badge badge-purple-transparent badge-xs">Manager</span>
												</td>
											</tr>
											<tr>
												<td class="border-0">
													<div class="d-flex align-items-center">
														<a href="javascript:void(0);" class="avatar">
															<img src="images/user-37.jpg"
																class="img-fluid rounded-circle" alt="img">
														</a>
														<div class="ms-2">
															<h6 class="fw-medium"><a href="javascript:void(0);">Anthony
																	Lewis</a></h6>
															<span class="fs-12">UI/UX Designer</span>
														</div>
													</div>
												</td>
												<td class="border-0">
													<span class="badge badge-pink-transparent badge-xs">UI/UX
														Design</span>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- /Employees -->

					<!-- Todo -->
					<div class="col-xxl-4 col-xl-6 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Todo</h5>
								<div class="d-flex align-items-center">
									<div class="dropdown mb-2 me-2">
										<a href="javascript:void(0);"
											class="btn btn-white border btn-sm d-inline-flex align-items-center"
											data-bs-toggle="dropdown">
											<i class="ti ti-calendar me-1"></i>Today
										</a>
										<ul class="dropdown-menu  dropdown-menu-end p-3">
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">This
													Month</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">This
													Week</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">Today</a>
											</li>
										</ul>
									</div>
									<a href="#"
										class="btn btn-primary btn-icon btn-xs rounded-circle d-flex align-items-center justify-content-center p-0 mb-2"
										data-bs-toggle="modal" data-bs-target="#add_todo"><i
											class="ti ti-plus fs-16"></i></a>
								</div>
							</div>
							<div class="card-body">
								<div class="d-flex align-items-center todo-item border p-2 br-5 mb-2">
									<i class="ti ti-grid-dots me-2"></i>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="todo1">
										<label class="form-check-label fw-medium" for="todo1">Add Holidays</label>
									</div>
								</div>
								<div class="d-flex align-items-center todo-item border p-2 br-5 mb-2">
									<i class="ti ti-grid-dots me-2"></i>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="todo2">
										<label class="form-check-label fw-medium" for="todo2">Add Meeting to
											Client</label>
									</div>
								</div>
								<div class="d-flex align-items-center todo-item border p-2 br-5 mb-2">
									<i class="ti ti-grid-dots me-2"></i>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="todo3">
										<label class="form-check-label fw-medium" for="todo3">Chat with Adrian</label>
									</div>
								</div>
								<div class="d-flex align-items-center todo-item border p-2 br-5 mb-2">
									<i class="ti ti-grid-dots me-2"></i>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="todo4">
										<label class="form-check-label fw-medium" for="todo4">Management Call</label>
									</div>
								</div>
								<div class="d-flex align-items-center todo-item border p-2 br-5 mb-2">
									<i class="ti ti-grid-dots me-2"></i>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="todo5">
										<label class="form-check-label fw-medium" for="todo5">Add Payroll</label>
									</div>
								</div>
								<div class="d-flex align-items-center todo-item border p-2 br-5 mb-0">
									<i class="ti ti-grid-dots me-2"></i>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="todo6">
										<label class="form-check-label fw-medium" for="todo6">Add Policy for Increment
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Todo -->

				</div>

				<div class="row">

					<!-- Sales Overview -->
					<div class="col-xl-7 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Sales Overview</h5>
								<div class="d-flex align-items-center">
									<div class="dropdown mb-2">
										<a href="javascript:void(0);"
											class="dropdown-toggle btn btn-white border-0 btn-sm d-inline-flex align-items-center fs-13 me-2"
											data-bs-toggle="dropdown">
											All Departments
										</a>
										<ul class="dropdown-menu  dropdown-menu-end p-3">
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">UI/UX
													Designer</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">HR
													Manager</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">Junior
													Tester</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="card-body pb-0">
								<div class="d-flex align-items-center justify-content-between flex-wrap">
									<div class="d-flex align-items-center mb-1">
										<p class="fs-13 text-gray-9 me-3 mb-0"><i
												class="ti ti-square-filled me-2 text-primary"></i>Income</p>
										<p class="fs-13 text-gray-9 mb-0"><i
												class="ti ti-square-filled me-2 text-gray-2"></i>Expenses</p>
									</div>
									<p class="fs-13 mb-1">Last Updated at 11:30PM</p>
								</div>
								<div id="sales-income"></div>
							</div>
						</div>
					</div>
					<!-- /Sales Overview -->

					<!-- Invoices -->
					<div class="col-xl-5 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Invoices</h5>
								<div class="d-flex align-items-center">
									<div class="dropdown mb-2">
										<a href="javascript:void(0);"
											class="dropdown-toggle btn btn-white btn-sm d-inline-flex align-items-center fs-13 me-2 border-0"
											data-bs-toggle="dropdown">
											Invoices
										</a>
										<ul class="dropdown-menu  dropdown-menu-end p-3">
											<li>
												<a href="javascript:void(0);"
													class="dropdown-item rounded-1">Invoices</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">Paid</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">Unpaid</a>
											</li>
										</ul>
									</div>
									<div class="dropdown mb-2">
										<a href="javascript:void(0);"
											class="btn btn-white border btn-sm d-inline-flex align-items-center"
											data-bs-toggle="dropdown">
											<i class="ti ti-calendar me-1"></i>This Week
										</a>
										<ul class="dropdown-menu  dropdown-menu-end p-3">
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">This
													Month</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">This
													Week</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">Today</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="card-body pt-2">
								<div class="table-responsive pt-1">
									<table class="table table-nowrap table-borderless mb-0">
										<tbody>
											<tr>
												<td class="px-0">
													<div class="d-flex align-items-center">
														<a href="invoice-details.html" class="avatar">
															<img src="images/user-39.jpg"
																class="img-fluid rounded-circle" alt="img">
														</a>
														<div class="ms-2">
															<h6 class="fw-medium"><a
																	href="invoice-details.html">Redesign Website</a>
															</h6>
															<span
																class="fs-13 d-inline-flex align-items-center">#INVOO2<i
																	class="ti ti-circle-filled fs-4 mx-1 text-primary"></i>Logistics</span>
														</div>
													</div>
												</td>
												<td>
													<p class="fs-13 mb-1">Payment</p>
													<h6 class="fw-medium">$3560</h6>
												</td>
												<td class="px-0 text-end">
													<span
														class="badge badge-danger-transparent badge-xs d-inline-flex align-items-center"><i
															class="ti ti-circle-filled fs-5 me-1"></i>Unpaid</span>
												</td>
											</tr>
											<tr>
												<td class="px-0">
													<div class="d-flex align-items-center">
														<a href="invoice-details.html" class="avatar">
															<img src="images/user-40.jpg"
																class="img-fluid rounded-circle" alt="img">
														</a>
														<div class="ms-2">
															<h6 class="fw-medium"><a href="invoice-details.html">Module
																	Completion</a></h6>
															<span
																class="fs-13 d-inline-flex align-items-center">#INVOO5<i
																	class="ti ti-circle-filled fs-4 mx-1 text-primary"></i>Yip
																Corp</span>
														</div>
													</div>
												</td>
												<td>
													<p class="fs-13 mb-1">Payment</p>
													<h6 class="fw-medium">$4175</h6>
												</td>
												<td class="px-0 text-end">
													<span
														class="badge badge-danger-transparent badge-xs d-inline-flex align-items-center"><i
															class="ti ti-circle-filled fs-5 me-1"></i>Unpaid</span>
												</td>
											</tr>
											<tr>
												<td class="px-0">
													<div class="d-flex align-items-center">
														<a href="invoice-details.html" class="avatar">
															<img src="images/user-55.jpg"
																class="img-fluid rounded-circle" alt="img">
														</a>
														<div class="ms-2">
															<h6 class="fw-medium"><a href="invoice-details.html">Change
																	on Emp Module</a></h6>
															<span
																class="fs-13 d-inline-flex align-items-center">#INVOO3<i
																	class="ti ti-circle-filled fs-4 mx-1 text-primary"></i>Ignis
																LLP</span>
														</div>
													</div>
												</td>
												<td>
													<p class="fs-13 mb-1">Payment</p>
													<h6 class="fw-medium">$6985</h6>
												</td>
												<td class="px-0 text-end">
													<span
														class="badge badge-danger-transparent badge-xs d-inline-flex align-items-center"><i
															class="ti ti-circle-filled fs-5 me-1"></i>Unpaid</span>
												</td>
											</tr>
											<tr>
												<td class="px-0">
													<div class="d-flex align-items-center">
														<a href="invoice-details.html" class="avatar">
															<img src="images/user-42.jpg"
																class="img-fluid rounded-circle" alt="img">
														</a>
														<div class="ms-2">
															<h6 class="fw-medium"><a href="invoice-details.html">Changes
																	on the Board</a></h6>
															<span
																class="fs-13 d-inline-flex align-items-center">#INVOO2<i
																	class="ti ti-circle-filled fs-4 mx-1 text-primary"></i>Ignis
																LLP</span>
														</div>
													</div>
												</td>
												<td>
													<p class="fs-13 mb-1">Payment</p>
													<h6 class="fw-medium">$1457</h6>
												</td>
												<td class="px-0 text-end">
													<span
														class="badge badge-danger-transparent badge-xs d-inline-flex align-items-center"><i
															class="ti ti-circle-filled fs-5 me-1"></i>Unpaid</span>
												</td>
											</tr>
											<tr>
												<td class="px-0">
													<div class="d-flex align-items-center">
														<a href="invoice-details.html" class="avatar">
															<img src="images/user-44.jpg"
																class="img-fluid rounded-circle" alt="img">
														</a>
														<div class="ms-2">
															<h6 class="fw-medium"><a
																	href="invoice-details.html">Hospital Management</a>
															</h6>
															<span
																class="fs-13 d-inline-flex align-items-center">#INVOO6<i
																	class="ti ti-circle-filled fs-4 mx-1 text-primary"></i>HCL
																Corp</span>
														</div>
													</div>
												</td>
												<td>
													<p class="fs-13 mb-1">Payment</p>
													<h6 class="fw-medium">$6458</h6>
												</td>
												<td class="px-0 text-end">
													<span
														class="badge badge-success-transparent badge-xs d-inline-flex align-items-center"><i
															class="ti ti-circle-filled fs-5 me-1"></i>Paid</span>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<a href="invoice.html" class="btn btn-light btn-md w-100 mt-2">View All</a>
							</div>
						</div>
					</div>
					<!-- /Invoices -->

				</div>

				<div class="row">

					<!-- Projects -->
					<div class="col-xxl-8 col-xl-7 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Projects</h5>
								<div class="d-flex align-items-center">
									<div class="dropdown mb-2">
										<a href="javascript:void(0);"
											class="btn btn-white border btn-sm d-inline-flex align-items-center"
											data-bs-toggle="dropdown">
											<i class="ti ti-calendar me-1"></i>This Week
										</a>
										<ul class="dropdown-menu  dropdown-menu-end p-3">
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">This
													Month</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">This
													Week</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">Today</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="card-body p-0">
								<div class="table-responsive">
									<table class="table table-nowrap mb-0">
										<thead>
											<tr>
												<th>ID</th>
												<th>Name</th>
												<th>Team</th>
												<th>Hours</th>
												<th>Deadline</th>
												<th>Priority</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><a href="project-details.html" class="link-default">PRO-001</a></td>
												<td>
													<h6 class="fw-medium"><a href="project-details.html">Office
															Management App</a></h6>
												</td>
												<td>
													<div class="avatar-list-stacked avatar-group-sm">
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="images/avatar-02.jpg"
																alt="img">
														</span>
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="images/avatar-03.jpg"
																alt="img">
														</span>
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="images/avatar-05.jpg"
																alt="img">
														</span>
													</div>
												</td>
												<td>
													<p class="mb-1">15/255 Hrs</p>
													<div class="progress progress-xs w-100" role="progressbar"
														aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
														<div class="progress-bar bg-primary" style="width: 40%"></div>
													</div>
												</td>
												<td>12 Sep 2024</td>
												<td>
													<span
														class="badge badge-danger d-inline-flex align-items-center badge-xs">
														<i class="ti ti-point-filled me-1"></i>High
													</span>
												</td>
											</tr>
											<tr>
												<td><a href="project-details.html" class="link-default">PRO-002</a></td>
												<td>
													<h6 class="fw-medium"><a href="project-details.html">Clinic
															Management </a></h6>
												</td>
												<td>
													<div class="avatar-list-stacked avatar-group-sm">
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="images/avatar-06.jpg"
																alt="img">
														</span>
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="images/avatar-07.jpg"
																alt="img">
														</span>
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="images/avatar-08.jpg"
																alt="img">
														</span>
														<a class="avatar bg-primary avatar-rounded text-fixed-white fs-10 fw-medium"
															href="javascript:void(0);">
															+1
														</a>
													</div>
												</td>
												<td>
													<p class="mb-1">15/255 Hrs</p>
													<div class="progress progress-xs w-100" role="progressbar"
														aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
														<div class="progress-bar bg-primary" style="width: 40%"></div>
													</div>
												</td>
												<td>24 Oct 2024</td>
												<td>
													<span
														class="badge badge-success d-inline-flex align-items-center badge-xs">
														<i class="ti ti-point-filled me-1"></i>Low
													</span>
												</td>
											</tr>
											<tr>
												<td><a href="project-details.html" class="link-default">PRO-003</a></td>
												<td>
													<h6 class="fw-medium"><a href="project-details.html">Educational
															Platform</a></h6>
												</td>
												<td>
													<div class="avatar-list-stacked avatar-group-sm">
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="images/avatar-06.jpg"
																alt="img">
														</span>
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="images/avatar-08.jpg"
																alt="img">
														</span>
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="images/avatar-09.jpg"
																alt="img">
														</span>
													</div>
												</td>
												<td>
													<p class="mb-1">40/255 Hrs</p>
													<div class="progress progress-xs w-100" role="progressbar"
														aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
														<div class="progress-bar bg-primary" style="width: 50%"></div>
													</div>
												</td>
												<td>18 Feb 2024</td>
												<td>
													<span
														class="badge badge-pink d-inline-flex align-items-center badge-xs">
														<i class="ti ti-point-filled me-1"></i>Medium
													</span>
												</td>
											</tr>
											<tr>
												<td><a href="project-details.html" class="link-default">PRO-004</a></td>
												<td>
													<h6 class="fw-medium"><a href="project-details.html">Chat & Call
															Mobile App</a></h6>
												</td>
												<td>
													<div class="avatar-list-stacked avatar-group-sm">
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="images/avatar-11.jpg"
																alt="img">
														</span>
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="images/avatar-12.jpg"
																alt="img">
														</span>
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="images/avatar-13.jpg"
																alt="img">
														</span>
													</div>
												</td>
												<td>
													<p class="mb-1">35/155 Hrs</p>
													<div class="progress progress-xs w-100" role="progressbar"
														aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
														<div class="progress-bar bg-primary" style="width: 50%"></div>
													</div>
												</td>
												<td>19 Feb 2024</td>
												<td>
													<span
														class="badge badge-danger d-inline-flex align-items-center badge-xs">
														<i class="ti ti-point-filled me-1"></i>High
													</span>
												</td>
											</tr>
											<tr>
												<td><a href="project-details.html" class="link-default">PRO-005</a></td>
												<td>
													<h6 class="fw-medium"><a href="project-details.html">Travel Planning
															Website</a></h6>
												</td>
												<td>
													<div class="avatar-list-stacked avatar-group-sm">
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="images/avatar-17.jpg"
																alt="img">
														</span>
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="images/avatar-18.jpg"
																alt="img">
														</span>
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="images/avatar-19.jpg"
																alt="img">
														</span>
													</div>
												</td>
												<td>
													<p class="mb-1">50/235 Hrs</p>
													<div class="progress progress-xs w-100" role="progressbar"
														aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
														<div class="progress-bar bg-primary" style="width: 50%"></div>
													</div>
												</td>
												<td>18 Feb 2024</td>
												<td>
													<span
														class="badge badge-pink d-inline-flex align-items-center badge-xs">
														<i class="ti ti-point-filled me-1"></i>Medium
													</span>
												</td>
											</tr>
											<tr>
												<td><a href="project-details.html" class="link-default">PRO-006</a></td>
												<td>
													<h6 class="fw-medium"><a href="project-details.html">Service Booking
															Software</a></h6>
												</td>
												<td>
													<div class="avatar-list-stacked avatar-group-sm">
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="images/avatar-06.jpg"
																alt="img">
														</span>
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="images/avatar-08.jpg"
																alt="img">
														</span>
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="images/avatar-09.jpg"
																alt="img">
														</span>
													</div>
												</td>
												<td>
													<p class="mb-1">40/255 Hrs</p>
													<div class="progress progress-xs w-100" role="progressbar"
														aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
														<div class="progress-bar bg-primary" style="width: 50%"></div>
													</div>
												</td>
												<td>20 Feb 2024</td>
												<td>
													<span
														class="badge badge-success d-inline-flex align-items-center badge-xs">
														<i class="ti ti-point-filled me-1"></i>Low
													</span>
												</td>
											</tr>
											<tr>
												<td class="border-0"><a href="project-details.html"
														class="link-default">PRO-008</a></td>
												<td class="border-0">
													<h6 class="fw-medium"><a href="project-details.html">Travel Planning
															Website</a></h6>
												</td>
												<td class="border-0">
													<div class="avatar-list-stacked avatar-group-sm">
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="images/avatar-15.jpg"
																alt="img">
														</span>
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="images/avatar-16.jpg"
																alt="img">
														</span>
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="images/avatar-17.jpg"
																alt="img">
														</span>
														<a class="avatar bg-primary avatar-rounded text-fixed-white fs-10 fw-medium"
															href="javascript:void(0);">
															+2
														</a>
													</div>
												</td>
												<td class="border-0">
													<p class="mb-1">15/255 Hrs</p>
													<div class="progress progress-xs w-100" role="progressbar"
														aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">
														<div class="progress-bar bg-primary" style="width: 45%"></div>
													</div>
												</td>
												<td class="border-0">17 Oct 2024</td>
												<td class="border-0">
													<span
														class="badge badge-pink d-inline-flex align-items-center badge-xs">
														<i class="ti ti-point-filled me-1"></i>Medium
													</span>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- /Projects -->

					<!-- Tasks Statistics -->
					<div class="col-xxl-4 col-xl-5 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Tasks Statistics</h5>
								<div class="d-flex align-items-center">
									<div class="dropdown mb-2">
										<a href="javascript:void(0);"
											class="btn btn-white border btn-sm d-inline-flex align-items-center"
											data-bs-toggle="dropdown">
											<i class="ti ti-calendar me-1"></i>This Week
										</a>
										<ul class="dropdown-menu  dropdown-menu-end p-3">
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">This
													Month</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">This
													Week</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">Today</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="chartjs-wrapper-demo position-relative mb-4">
									<canvas id="mySemiDonutChart" height="190"></canvas>
									<div class="position-absolute text-center attendance-canvas">
										<p class="fs-13 mb-1">Total Tasks</p>
										<h3>124/165</h3>
									</div>
								</div>
								<div class="d-flex align-items-center flex-wrap">
									<div class="border-end text-center me-2 pe-2 mb-3">
										<p class="fs-13 d-inline-flex align-items-center mb-1"><i
												class="ti ti-circle-filled fs-10 me-1 text-warning"></i>Ongoing</p>
										<h5>24%</h5>
									</div>
									<div class="border-end text-center me-2 pe-2 mb-3">
										<p class="fs-13 d-inline-flex align-items-center mb-1"><i
												class="ti ti-circle-filled fs-10 me-1 text-info"></i>On Hold </p>
										<h5>10%</h5>
									</div>
									<div class="border-end text-center me-2 pe-2 mb-3">
										<p class="fs-13 d-inline-flex align-items-center mb-1"><i
												class="ti ti-circle-filled fs-10 me-1 text-danger"></i>Overdue</p>
										<h5>16%</h5>
									</div>
									<div class="text-center me-2 pe-2 mb-3">
										<p class="fs-13 d-inline-flex align-items-center mb-1"><i
												class="ti ti-circle-filled fs-10 me-1 text-success"></i>Ongoing</p>
										<h5>40%</h5>
									</div>
								</div>
								<div class="bg-dark br-5 p-3 pb-0 d-flex align-items-center justify-content-between">
									<div class="mb-2">
										<h4 class="text-success">389/689 hrs</h4>
										<p class="fs-13 mb-0">Spent on Overall Tasks This Week</p>
									</div>
									<a href="tasks.html" class="btn btn-sm btn-light mb-2 text-nowrap">View All</a>
								</div>
							</div>
						</div>
					</div>
					<!-- /Tasks Statistics -->

				</div>

				<div class="row">

					<!-- Schedules -->
					<div class="col-xxl-4 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Schedules</h5>
								<a href="candidates.html" class="btn btn-light btn-md mb-2">View All</a>
							</div>
							<div class="card-body">
								<div class="bg-light p-3 br-5 mb-4">
									<span class="badge badge-secondary badge-xs mb-1">UI/ UX Designer</span>
									<h6 class="mb-2 text-truncate">Interview Candidates - UI/UX Designer</h6>
									<div class="d-flex align-items-center flex-wrap">
										<p class="fs-13 mb-1 me-2"><i class="ti ti-calendar-event me-2"></i>Thu, 15 Feb
											2025</p>
										<p class="fs-13 mb-1"><i class="ti ti-clock-hour-11 me-2"></i>01:00 PM - 02:20
											PM</p>
									</div>
									<div class="d-flex align-items-center justify-content-between border-top mt-2 pt-3">
										<div class="avatar-list-stacked avatar-group-sm">
											<span class="avatar avatar-rounded">
												<img class="border border-white" src="images/user-49.jpg" alt="img">
											</span>
											<span class="avatar avatar-rounded">
												<img class="border border-white" src="images/user-13.jpg" alt="img">
											</span>
											<span class="avatar avatar-rounded">
												<img class="border border-white" src="images/user-11.jpg" alt="img">
											</span>
											<span class="avatar avatar-rounded">
												<img class="border border-white" src="images/user-22.jpg" alt="img">
											</span>
											<span class="avatar avatar-rounded">
												<img class="border border-white" src="images/user-58.jpg" alt="img">
											</span>
											<a class="avatar bg-primary avatar-rounded text-fixed-white fs-10 fw-medium"
												href="javascript:void(0);">
												+3
											</a>
										</div>
										<a href="#" class="btn btn-primary btn-xs">Join Meeting</a>
									</div>
								</div>
								<div class="bg-light p-3 br-5 mb-0">
									<span class="badge badge-dark badge-xs mb-1">IOS Developer</span>
									<h6 class="mb-2 text-truncate">Interview Candidates - IOS Developer</h6>
									<div class="d-flex align-items-center flex-wrap">
										<p class="fs-13 mb-1 me-2"><i class="ti ti-calendar-event me-2"></i>Thu, 15 Feb
											2025</p>
										<p class="fs-13 mb-1"><i class="ti ti-clock-hour-11 me-2"></i>02:00 PM - 04:20
											PM</p>
									</div>
									<div class="d-flex align-items-center justify-content-between border-top mt-2 pt-3">
										<div class="avatar-list-stacked avatar-group-sm">
											<span class="avatar avatar-rounded">
												<img class="border border-white" src="images/user-49.jpg" alt="img">
											</span>
											<span class="avatar avatar-rounded">
												<img class="border border-white" src="images/user-13.jpg" alt="img">
											</span>
											<span class="avatar avatar-rounded">
												<img class="border border-white" src="images/user-11.jpg" alt="img">
											</span>
											<span class="avatar avatar-rounded">
												<img class="border border-white" src="images/user-22.jpg" alt="img">
											</span>
											<span class="avatar avatar-rounded">
												<img class="border border-white" src="images/user-58.jpg" alt="img">
											</span>
											<a class="avatar bg-primary avatar-rounded text-fixed-white fs-10 fw-medium"
												href="javascript:void(0);">
												+3
											</a>
										</div>
										<a href="#" class="btn btn-primary btn-xs">Join Meeting</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Schedules -->

					<!-- Recent Activities -->
					<div class="col-xxl-4 col-xl-6 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Recent Activities</h5>
								<a href="activity.html" class="btn btn-light btn-md mb-2">View All</a>
							</div>
							<div class="card-body">
								<div class="recent-item">
									<div class="d-flex justify-content-between">
										<div class="d-flex align-items-center w-100">
											<a href="javscript:void(0);" class="avatar  flex-shrink-0">
												<img src="images/user-38.jpg" class="rounded-circle" alt="img">
											</a>
											<div class="ms-2 flex-fill">
												<div class="d-flex align-items-center justify-content-between">
													<h6 class="fs-medium text-truncate"><a
															href="javscript:void(0);">Matt Morgan</a></h6>
													<p class="fs-13">05:30 PM</p>
												</div>
												<p class="fs-13">Added New Project <span class="text-primary">HRMS
														Dashboard</span></p>
											</div>
										</div>
									</div>
								</div>
								<div class="recent-item">
									<div class="d-flex justify-content-between">
										<div class="d-flex align-items-center w-100">
											<a href="javscript:void(0);" class="avatar  flex-shrink-0">
												<img src="images/user-01.jpg" class="rounded-circle" alt="img">
											</a>
											<div class="ms-2 flex-fill">
												<div class="d-flex align-items-center justify-content-between">
													<h6 class="fs-medium text-truncate"><a href="javscript:void(0);">Jay
															Ze</a></h6>
													<p class="fs-13">05:00 PM</p>
												</div>
												<p class="fs-13">Commented on Uploaded Document</p>
											</div>
										</div>
									</div>
								</div>
								<div class="recent-item">
									<div class="d-flex justify-content-between">
										<div class="d-flex align-items-center w-100">
											<a href="javscript:void(0);" class="avatar  flex-shrink-0">
												<img src="images/user-19.jpg" class="rounded-circle" alt="img">
											</a>
											<div class="ms-2 flex-fill">
												<div class="d-flex align-items-center justify-content-between">
													<h6 class="fs-medium text-truncate"><a
															href="javscript:void(0);">Mary Donald</a></h6>
													<p class="fs-13">05:30 PM</p>
												</div>
												<p class="fs-13">Approved Task Projects</p>
											</div>
										</div>
									</div>
								</div>
								<div class="recent-item">
									<div class="d-flex justify-content-between">
										<div class="d-flex align-items-center w-100">
											<a href="javscript:void(0);" class="avatar  flex-shrink-0">
												<img src="images/user-11.jpg" class="rounded-circle" alt="img">
											</a>
											<div class="ms-2 flex-fill">
												<div class="d-flex align-items-center justify-content-between">
													<h6 class="fs-medium text-truncate"><a
															href="javscript:void(0);">George David</a></h6>
													<p class="fs-13">06:00 PM</p>
												</div>
												<p class="fs-13">Requesting Access to Module Tickets</p>
											</div>
										</div>
									</div>
								</div>
								<div class="recent-item">
									<div class="d-flex justify-content-between">
										<div class="d-flex align-items-center w-100">
											<a href="javscript:void(0);" class="avatar  flex-shrink-0">
												<img src="images/user-20.jpg" class="rounded-circle" alt="img">
											</a>
											<div class="ms-2 flex-fill">
												<div class="d-flex align-items-center justify-content-between">
													<h6 class="fs-medium text-truncate"><a
															href="javscript:void(0);">Aaron Zeen</a></h6>
													<p class="fs-13">06:30 PM</p>
												</div>
												<p class="fs-13">Downloaded App Reportss</p>
											</div>
										</div>
									</div>
								</div>
								<div class="recent-item">
									<div class="d-flex justify-content-between">
										<div class="d-flex align-items-center w-100">
											<a href="javscript:void(0);" class="avatar  flex-shrink-0">
												<img src="images/user-08.jpg" class="rounded-circle" alt="img">
											</a>
											<div class="ms-2 flex-fill">
												<div class="d-flex align-items-center justify-content-between">
													<h6 class="fs-medium text-truncate"><a
															href="javscript:void(0);">Hendry Daniel</a></h6>
													<p class="fs-13">05:30 PM</p>
												</div>
												<p class="fs-13">Completed New Project <span>HMS</span></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Recent Activities -->

					<!-- Birthdays -->
					<div class="col-xxl-4 col-xl-6 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Birthdays</h5>
								<a href="javascript:void(0);" class="btn btn-light btn-md mb-2">View All</a>
							</div>
							<div class="card-body pb-1">
								<h6 class="mb-2">Today</h6>
								<div class="bg-light p-2 border border-dashed rounded-top mb-3">
									<div class="d-flex align-items-center justify-content-between">
										<div class="d-flex align-items-center">
											<a href="javascript:void(0);" class="avatar">
												<img src="images/user-38.jpg" class="rounded-circle" alt="img">
											</a>
											<div class="ms-2 overflow-hidden">
												<h6 class="fs-medium ">Andrew Jermia</h6>
												<p class="fs-13">IOS Developer</p>
											</div>
										</div>
										<a href="javascript:void(0);" class="btn btn-secondary btn-xs"><i
												class="ti ti-cake me-1"></i>Send</a>
									</div>
								</div>
								<h6 class="mb-2">Tomorow</h6>
								<div class="bg-light p-2 border border-dashed rounded-top mb-3">
									<div class="d-flex align-items-center justify-content-between">
										<div class="d-flex align-items-center">
											<a href="javascript:void(0);" class="avatar">
												<img src="images/user-10.jpg" class="rounded-circle" alt="img">
											</a>
											<div class="ms-2 overflow-hidden">
												<h6 class="fs-medium"><a href="javascript:void(0);">Mary Zeen</a></h6>
												<p class="fs-13">UI/UX Designer</p>
											</div>
										</div>
										<a href="javascript:void(0);" class="btn btn-secondary btn-xs"><i
												class="ti ti-cake me-1"></i>Send</a>
									</div>
								</div>
								<div class="bg-light p-2 border border-dashed rounded-top mb-3">
									<div class="d-flex align-items-center justify-content-between">
										<div class="d-flex align-items-center">
											<a href="javascript:void(0);" class="avatar">
												<img src="images/user-09.jpg" class="rounded-circle" alt="img">
											</a>
											<div class="ms-2 overflow-hidden">
												<h6 class="fs-medium "><a href="javascript:void(0);">Antony Lewis</a>
												</h6>
												<p class="fs-13">Android Developer</p>
											</div>
										</div>
										<a href="javascript:void(0);" class="btn btn-secondary btn-xs"><i
												class="ti ti-cake me-1"></i>Send</a>
									</div>
								</div>
								<h6 class="mb-2">25 Jan 2025</h6>
								<div class="bg-light p-2 border border-dashed rounded-top mb-3">
									<div class="d-flex align-items-center justify-content-between">
										<div class="d-flex align-items-center">
											<span class="avatar">
												<img src="images/user-12.jpg" class="rounded-circle" alt="img">
											</span>
											<div class="ms-2 overflow-hidden">
												<h6 class="fs-medium ">Doglas Martini</h6>
												<p class="fs-13">.Net Developer</p>
											</div>
										</div>
										<a href="javascript:void(0);" class="btn btn-secondary btn-xs"><i
												class="ti ti-cake me-1"></i>Send</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Birthdays -->

				</div>

			</div>

		 

	
@endsection
