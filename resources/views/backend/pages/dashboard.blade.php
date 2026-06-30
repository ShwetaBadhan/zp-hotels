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

				<div class="container-fluid">
					<div class="hotel-welcome-banner">
						<div class="row align-items-center">

							<div class="col-lg-8">
								<div class="welcome-content">
									<span class="welcome-tag">
										<i class="ri-hotel-line"></i> ZP Grand Hotel
									</span>

									<h2>Welcome Back, {{ Auth::user()->name ?? 'Admin' }} !!!</h2>

									<p>
										Here's a quick overview of your hotel today.
										Manage bookings, monitor occupancy, and keep everything running smoothly.
									</p>

									<!-- <div class="welcome-stats">

											<div class="stat-box">
												<i class="ri-hotel-bed-line"></i>
												<div>
													<h4>{{ $availableRooms ?? 0 }}</h4>
													<span>Available Rooms</span>
												</div>
											</div>

											<div class="stat-box">
												<i class="ri-calendar-check-line"></i>
												<div>
													<h4>{{ $totalBookings ?? 0 }}</h4>
													<span>Total Bookings</span>
												</div>
											</div>


										</div> -->

								</div>
							</div>

							<div class="col-lg-4">

								<div class="welcome-right">

									<div class="today-card">
										<h6>Today's Date</h6>

										<h3>{{ now()->format('d M Y') }}</h3>

										<span>{{ now()->format('l') }}</span>
									</div>



								</div>

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
				<!-- <div class="row">
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

					</div> -->
				<div class="row">
					<div class="col-xl-6">
						<div class="lead-card">

							<div class="lead-header">
								<div>
									<h4><i class="ri-customer-service-2-line"></i> Contact Leads</h4>
									<span>Latest enquiries</span>
								</div>

								<a href="{{ route('admin-contact-leads.index') }}">
									View All
									<i class="ri-arrow-right-line"></i>
								</a>
							</div>

							<div class="lead-body">

								@forelse($contactLeads as $lead)

									<div class="lead-item">

										<div class="lead-avatar">
											{{ strtoupper(substr($lead->name, 0, 1)) }}
										</div>

										<div class="lead-info">

											<h5>{{ $lead->name }}</h5>

											<p>
												<i class="ri-mail-line"></i>
												{{ $lead->email }}
											</p>

											<p>
												<i class="ri-phone-line"></i>
												{{ $lead->phone }}
											</p>

										</div>

										<div class="lead-date">

											<span class="badge bg-success">
												New
											</span>

											<small>
												{{ $lead->created_at->format('d M') }}
											</small>

										</div>

									</div>

								@empty

									<div class="empty-state">

										<i class="ri-inbox-line"></i>

										<h5>No Contact Leads</h5>

										<p>New enquiries will appear here.</p>

									</div>

								@endforelse

							</div>

						</div>
					</div>
					<div class="col-xl-6">
						<div class="lead-card">

							<div class="lead-header">

								<div>
									<h4><i class="ri-hotel-bed-line"></i> Booking Leads</h4>
									<span>Latest booking requests</span>
								</div>

								<a href="#">
									View All
									<i class="ri-arrow-right-line"></i>
								</a>

							</div>

							<div class="lead-body">

								@forelse($bookingLeads as $lead)

														<div class="lead-item">

															<div class="lead-avatar bg-warning">
																{{ strtoupper(substr($lead->name, 0, 1)) }}
															</div>

															<div class="lead-info">

																<h5>{{ $lead->name }}</h5>

																<p>
																	<i class="ri-mail-line"></i>
																	{{ $lead->email }}
																</p>

																<p>
																	<i class="ri-phone-line"></i>
																	{{ $lead->phone }}
																</p>

															</div>

															<div class="lead-date">

																<span class="badge bg-primary">

																	{{ $lead->check_in
									? \Carbon\Carbon::parse($lead->check_in)->format('d M')
									: '-' }}

																</span>

																<small>

																	{{ $lead->created_at->format('d M') }}

																</small>

															</div>

														</div>

								@empty

									<div class="empty-state">

										<i class="ri-calendar-close-line"></i>

										<h5>No Booking Leads</h5>

										<p>Booking requests will appear here.</p>

									</div>

								@endforelse

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

	</main>
@endsection