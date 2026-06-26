@extends('backend.layouts.master')
@section('title', 'Admin Dashboard')
@section('content')
	<main class="wrapper sb-default">
		<!-- main content -->
		<div class="lh-main-content">
			<div class="container-fluid">
				<!-- Page title & breadcrumb -->
				<div class="lh-page-title">
					<div class="lh-breadcrumb">
						<h5>Dashboard</h5>
						<ul>
							<li><a href="/">Home</a></li>
							<li>Dashboard</li>
						</ul>
					</div>
					<div class="lh-tools">
						<a href="javascript:void(0)" title="Refresh" class="refresh"><i class="ri-refresh-line"></i></a>
						<div id="pagedate">
							<div class="lh-date-range" title="Date">
								<span></span>
							</div>
						</div>
						<div class="filter">
							<div class="dropdown" title="Filter">
								<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
									data-bs-toggle="dropdown" aria-expanded="false">
									<i class="ri-sound-module-line"></i>
								</button>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
									<li><a class="dropdown-item" href="#">Booking</a></li>
									<li><a class="dropdown-item" href="#">Revenue</a></li>
									<li><a class="dropdown-item" href="#">Expence</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row">

					<!-- Users -->
					<div class="col-xl-3 col-md-6">
						<div class="lh-card lh-card-1">
							<div class="lh-card-content label-card">
								<div class="title">
									<div class="growth-numbers">
										<h4>Users</h4>
										<h5>{{ $totalUsers ?? 0 }}</h5>
									</div>
									<span class="icon">
										<i class="ri-user-3-line"></i>
									</span>
								</div>

								<p class="card-groth">
									<span>Total Registered Users</span>
								</p>

								<div class="mini-chart">
									<div id="userNumbers"></div>
								</div>
							</div>
						</div>
					</div>

					<!-- Bookings -->
					<div class="col-xl-3 col-md-6">
						<div class="lh-card lh-card-2">
							<div class="lh-card-content label-card">
								<div class="title">
									<div class="growth-numbers">
										<h4>Bookings</h4>
										<h5>{{ $totalBookings ?? 0 }}</h5>
									</div>

									<span class="icon">
										<i class="ri-shopping-bag-3-line"></i>
									</span>
								</div>

								<p class="card-groth">
									<span>Total Bookings</span>
								</p>

								<div class="mini-chart">
									<div id="bookingNumbers"></div>
								</div>
							</div>
						</div>
					</div>

					<!-- Revenue -->
					<div class="col-xl-3 col-md-6">
						<div class="lh-card lh-card-3">
							<div class="lh-card-content label-card">
								<div class="title">
									<div class="growth-numbers">
										<h4>Revenue</h4>
										<h5>₹{{ number_format($totalRevenue ?? 0, 2) }}</h5>
									</div>

									<span class="icon">
										<i class="ri-money-rupee-circle-line"></i>
									</span>
								</div>

								<p class="card-groth">
									<span>Total Confirmed Revenue</span>
								</p>

								<div class="mini-chart">
									<div id="revenueNumbers"></div>
								</div>
							</div>
						</div>
					</div>

					<!-- Rooms -->
					<div class="col-xl-3 col-md-6">
						<div class="lh-card lh-card-4">
							<div class="lh-card-content label-card">
								<div class="title">
									<div class="growth-numbers">
										<h4>Rooms</h4>
										<h5>
											<span data-bs-toggle="tooltip" title="Available Rooms">
												{{ $availableRooms ?? 0 }}
											</span>
											/{{ $totalRooms ?? 0 }}
										</h5>
									</div>

									<span class="icon">
										<i class="ri-hotel-bed-line"></i>
									</span>
								</div>

								<p class="card-groth">
									<span>Available / Total Rooms</span>
								</p>

								<div class="mini-chart">
									<div id="expensesNumbers"></div>
								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="row">
					<div class="col-xl-8 col-md-12">
						<div class="lh-card revenue-overview">
							<div class="lh-card-header header-575">
								<h4 class="lh-card-title">Revenue Overview</h4>
								<div class="header-tools">
									<a href="javascript:void(0)" class="m-r-10 lh-full-card">
										<i class="ri-fullscreen-line" title="Full Screen"></i></a>
									<div class="lh-date-range date" title="Date">
										<span></span>
									</div>
								</div>
							</div>
							<div class="lh-card-content">
								<div class="lh-chart-header">
									<div class="block">
										<h6>Bookings</h6>
										<h5>825
											<span class="up"><i class="ri-arrow-up-line"></i>24%</span>
										</h5>
									</div>
									<div class="block">
										<h6>Revenue</h6>
										<h5>$89k
											<span class="up"><i class="ri-arrow-up-line"></i>24%</span>
										</h5>
									</div>
									<div class="block">
										<h6>Expence</h6>
										<h5>$68k
											<span class="down"><i class="ri-arrow-down-line"></i>24%</span>
										</h5>
									</div>
									<div class="block">
										<h6>Profit</h6>
										<h5>$21k
											<span class="up"><i class="ri-arrow-up-line"></i>24%</span>
										</h5>
									</div>
								</div>
								<div class="lh-chart-content">
									<div id="overviewChart"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-md-12">
						<div class="lh-card" id="lhmap">
							<div class="lh-card-header">
								<h4 class="lh-card-title">Top Country</h4>
								<div class="header-tools">
									<div class="lh-date-range dots">
										<span></span>
									</div>
								</div>
							</div>
							<div class="lh-card-content">
								<div class="lh-map-view">
									<div id="world-map"></div>
								</div>
								<div class="lh-map-detail">
									<div class="lh-map-detail">
										<div class="title">
											<h5>Revenue</h5>
											<a href="#" class="visit" title="View all data">view <i
													class="ri-arrow-right-line"></i></a>
										</div>
										<div class="lh-detail-list">
											<div class="lh-label">
												<div>
													<label>India</label>
													<span class="down"><i class="ri-arrow-down-line"></i>2.6%</span>
												</div>
												<p>$958.5k</p>
											</div>
											<div class="progress">
												<div class="progress-bar bg-primary" role="progressbar" style="width: 95%"
													aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
										<div class="lh-detail-list">
											<div class="lh-label">
												<div>
													<label>Morocco</label>
													<span class="up"><i class="ri-arrow-up-line"></i>5.6%</span>
												</div>
												<p>$788.7k</p>
											</div>
											<div class="progress">
												<div class="progress-bar bg-secondary" role="progressbar" style="width: 84%"
													aria-valuenow="84" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
										<div class="lh-detail-list">
											<div class="lh-label">
												<div>
													<label>Brazil</label>
													<span class="up"><i class="ri-arrow-up-line"></i>3.7%</span>
												</div>
												<p>$592.2k</p>
											</div>
											<div class="progress">
												<div class="progress-bar bg-secondary" role="progressbar" style="width: 76%"
													aria-valuenow="76" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="row">
					<div class="col-xl-12 col-md-12">
						<div class="lh-card" id="bookingtbl">
							<div class="lh-card-header">
								<h4 class="lh-card-title">Contact Leads</h4>
								<div class="header-tools">
									<a href="javascript:void(0)" class="m-r-10 lh-full-card"><i class="ri-fullscreen-line"
											title="Full Screen"></i></a>
									<div class="lh-date-range dots">
										<span></span>
									</div>
								</div>
							</div>
							<div class="lh-card-content card-default">
								<div class="booking-table">
									<div class="table-responsive">
										<table id="booking_table" class="table">
											<thead>
												<tr>
													<th>ID</th>
													<th>Name</th>
													<th>Email</th>
													<th>Phone</th>
													<th>Enquiry For</th>
													<th>Check In</th>
													<th>Check Out</th>
												</tr>
											</thead>
											<tbody>
												@forelse($contactLeads ?? [] as $lead)
													<tr>
														<td>{{ $lead->id }}</td>

														<td>
															<strong>{{ $lead->name ?? '-' }}</strong><br>
															<small>{{ $lead->email ?? '-' }}</small>
														</td>

														<td>{{ $lead->phone ?? '-' }}</td>

														<td>{{ $lead->enuiry_for ?? '-' }}</td>

														<td>
															{{ $lead->check_in ? \Carbon\Carbon::parse($lead->check_in)->format('d M Y') : '-' }}
														</td>

														<td>
															{{ $lead->check_out ? \Carbon\Carbon::parse($lead->check_out)->format('d M Y') : '-' }}
														</td>

														
													</tr>
												@empty
													<tr>
														<td colspan="8" class="text-center text-muted py-4">
															No contact leads found.
														</td>
													</tr>
												@endforelse
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


@endsection