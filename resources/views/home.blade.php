@extends('layouts.app')

@section('title', $title ?? 'Xlung')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h2>Welcome back,</h2>
                        <p class="mb-md-0">Your analytics dashboard template.</p>
                    </div>
                    <div class="d-flex">
                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                        <p class="text-primary mb-0 hover-cursor">Analytics</p>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <button type="button" class="btn btn-light bg-white btn-icon mr-3 d-none d-md-block ">
                        <i class="mdi mdi-download text-muted"></i>
                    </button>
                    <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                        <i class="mdi mdi-clock-outline text-muted"></i>
                    </button>
                    <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                        <i class="mdi mdi-plus text-muted"></i>
                    </button>
                    <button class="btn btn-primary mt-2 mt-xl-0">Download report</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body dashboard-tabs p-0">
                    <ul class="nav nav-tabs px-4" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="sales-tab" data-toggle="tab" href="#sales" role="tab" aria-controls="sales" aria-selected="false">Sales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="purchases-tab" data-toggle="tab" href="#purchases" role="tab" aria-controls="purchases" aria-selected="false">Purchases</a>
                        </li>
                    </ul>
                    <div class="tab-content py-0 px-0">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                            <div class="d-flex flex-wrap justify-content-xl-between">
                                <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-calendar-heart icon-lg mr-3 text-primary"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Start date</small>
                                        <div class="dropdown">
                                            <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <h5 class="mb-0 d-inline-block">26 Jul 2018</h5>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkA">
                                                <a class="dropdown-item" href="#">12 Aug 2018</a>
                                                <a class="dropdown-item" href="#">22 Sep 2018</a>
                                                <a class="dropdown-item" href="#">21 Oct 2018</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-currency-usd mr-3 icon-lg text-danger"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Revenue</small>
                                        <h5 class="mr-2 mb-0">$577545</h5>
                                    </div>
                                </div>
                                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-eye mr-3 icon-lg text-success"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Total views</small>
                                        <h5 class="mr-2 mb-0">9833550</h5>
                                    </div>
                                </div>
                                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-download mr-3 icon-lg text-warning"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Downloads</small>
                                        <h5 class="mr-2 mb-0">2233783</h5>
                                    </div>
                                </div>
                                <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-flag mr-3 icon-lg text-danger"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Flagged</small>
                                        <h5 class="mr-2 mb-0">3497843</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="sales" role="tabpanel" aria-labelledby="sales-tab">
                            <div class="d-flex flex-wrap justify-content-xl-between">
                                <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-calendar-heart icon-lg mr-3 text-primary"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Start date</small>
                                        <div class="dropdown">
                                            <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <h5 class="mb-0 d-inline-block">26 Jul 2018</h5>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkA">
                                                <a class="dropdown-item" href="#">12 Aug 2018</a>
                                                <a class="dropdown-item" href="#">22 Sep 2018</a>
                                                <a class="dropdown-item" href="#">21 Oct 2018</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-download mr-3 icon-lg text-warning"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Downloads</small>
                                        <h5 class="mr-2 mb-0">2233783</h5>
                                    </div>
                                </div>
                                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-eye mr-3 icon-lg text-success"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Total views</small>
                                        <h5 class="mr-2 mb-0">9833550</h5>
                                    </div>
                                </div>
                                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-currency-usd mr-3 icon-lg text-danger"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Revenue</small>
                                        <h5 class="mr-2 mb-0">$577545</h5>
                                    </div>
                                </div>
                                <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-flag mr-3 icon-lg text-danger"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Flagged</small>
                                        <h5 class="mr-2 mb-0">3497843</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="purchases" role="tabpanel" aria-labelledby="purchases-tab">
                            <div class="d-flex flex-wrap justify-content-xl-between">
                                <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-calendar-heart icon-lg mr-3 text-primary"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Start date</small>
                                        <div class="dropdown">
                                            <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <h5 class="mb-0 d-inline-block">26 Jul 2018</h5>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkA">
                                                <a class="dropdown-item" href="#">12 Aug 2018</a>
                                                <a class="dropdown-item" href="#">22 Sep 2018</a>
                                                <a class="dropdown-item" href="#">21 Oct 2018</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-currency-usd mr-3 icon-lg text-danger"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Revenue</small>
                                        <h5 class="mr-2 mb-0">$577545</h5>
                                    </div>
                                </div>
                                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-eye mr-3 icon-lg text-success"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Total views</small>
                                        <h5 class="mr-2 mb-0">9833550</h5>
                                    </div>
                                </div>
                                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-download mr-3 icon-lg text-warning"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Downloads</small>
                                        <h5 class="mr-2 mb-0">2233783</h5>
                                    </div>
                                </div>
                                <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-flag mr-3 icon-lg text-danger"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Flagged</small>
                                        <h5 class="mr-2 mb-0">3497843</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div id="weather-temp">Session</div>
                    <table class="table">
                        <thead>
                        <tr>
                            <td>Particular</td>
                            <td>X Lung</td>
                            <td>PSV</td>
                        </tr>
                        </thead>
                        <tr>
                            <td>Gender</td>
                            <td>{{ session('xLung')['gender'] ?? '-' }}</td>
                            <td>{{ session('pLung')['gender'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Age</td>
                            <td>{{ session('xLung')['age'] ?? '-' }}</td>
                            <td>{{ session('pLung')['age'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Height</td>
                            <td>{{ session('xLung')['height'] ?? '-' }}</td>
                            <td>{{ session('pLung')['height'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Weight</td>
                            <td>{{ session('xLung')['weight'] ?? '-' }}</td>
                            <td>{{ session('pLung')['weight'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>IBW</td>
                            <td>{{ session('xLung')['ibm'] ?? '-' }}</td>
                            <td>{{ session('pLung')['ibm'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>RAV</td>
                            <td>{{ session('xLung')['rva'] ?? '-' }}</td>
                            <td>{{ session('pLung')['rva'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>CST</td>
                            <td>{{ session('xLung')['cst'] ?? '-' }}</td>
                            <td>{{ session('pLung')['cst'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>FIO</td>
                            <td>{{ session('xLung')['fio'] ?? '-' }}</td>
                            <td>{{ session('pLung')['fio'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Pmus</td>
                            <td>{{ session('xLung')['pmus'] ?? '-' }}</td>
                            <td>{{ session('pLung')['pmus'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>RR(Bpm)</td>
                            <td>{{ session('xLung')['rrBpm'] ?? '-' }}</td>
                            <td>{{ session('pLung')['rrBpm'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Duration</td>
                            <td>{{ session('xLung')['duration'] ?? '-' }}</td>
                            <td>{{ session('pLung')['duration'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>PS</td>
                            <td>{{ session('xLung')['ps'] ?? '-' }}</td>
                            <td>{{ session('pLung')['ps'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Rise Time</td>
                            <td>{{ session('xLung')['riseTime'] ?? '-' }}</td>
                            <td>{{ session('pLung')['riseTime'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Cycle Off</td>
                            <td>{{ session('xLung')['cycleOff'] ?? '-' }}</td>
                            <td>{{ session('pLung')['cycleOff'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>COPD</td>
                            <td>{{ session('xLung')['copd'] ?? '-' }}</td>
                            <td>{{ session('pLung')['copd'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Peep</td>
                            <td>{{ session('xLung')['peep'] ?? '-' }}</td>
                            <td>{{ session('pLung')['peep'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Trigger</td>
                            <td>{{ session('xLung')['trigger'] ?? '-' }}</td>
                            <td>{{ session('pLung')['trigger'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Sestivity</td>
                            <td>{{ session('xLung')['senstivity'] ?? '-' }}</td>
                            <td>{{ session('pLung')['senstivity'] ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div id="weather-temp">Session</div>
                    <table class="table">
                        <thead>
                        <tr>
                            <td>Particular</td>
                            <td>X Lung</td>
                            <td>PSV</td>
                        </tr>
                        </thead>
                        <tr>
                            <td>Gender</td>
                            <td>{{ session('xLung')['vtiml'] ?? '-' }}</td>
                            <td>{{ session('pLung')['vtiml'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Age</td>
                            <td>{{ session('xLung')['vtiml'] ?? '-' }}</td>
                            <td>{{ session('pLung')['vtiml'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Height</td>
                            <td>{{ session('xLung')['vtkg'] ?? '-' }}</td>
                            <td>{{ session('pLung')['vtkg'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Weight</td>
                            <td>{{ session('xLung')['vtekg'] ?? '-' }}</td>
                            <td>{{ session('pLung')['vtekg'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>IBW</td>
                            <td>{{ session('xLung')['rrBpm'] ?? '-' }}</td>
                            <td>{{ session('pLung')['rrBpm'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>RAV</td>
                            <td>{{ session('xLung')['vePerMint'] ?? '-' }}</td>
                            <td>{{ session('pLung')['vePerMint'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>CST</td>
                            <td>{{ session('xLung')['inspTime'] ?? '-' }}</td>
                            <td>{{ session('pLung')['inspTime'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>FIO</td>
                            <td>{{ session('xLung')['expTime'] ?? '-' }}</td>
                            <td>{{ session('pLung')['expTime'] ?? '-' }}</td>
                        </tr>
                        <tr><td></td><td></td><td></td></tr>
                        <tr><td></td><td></td><td></td></tr>
                        <tr><td></td><td></td><td></td></tr>
                        <tr>
                            <td>Pmus</td>
                            <td>{{ session('xLung')['pmus'] ?? '-' }}</td>
                            <td>{{ session('pLung')['pmus'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>RR(Bpm)</td>
                            <td>{{ session('xLung')['rrBpm'] ?? '-' }}</td>
                            <td>{{ session('pLung')['rrBpm'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Duration</td>
                            <td>{{ session('xLung')['duration'] ?? '-' }}</td>
                            <td>{{ session('pLung')['duration'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>PS</td>
                            <td>{{ session('xLung')['ps'] ?? '-' }}</td>
                            <td>{{ session('pLung')['ps'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Rise Time</td>
                            <td>{{ session('xLung')['riseTime'] ?? '-' }}</td>
                            <td>{{ session('pLung')['riseTime'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Cycle Off</td>
                            <td>{{ session('xLung')['cycleOff'] ?? '-' }}</td>
                            <td>{{ session('pLung')['cycleOff'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>COPD</td>
                            <td>{{ session('xLung')['copd'] ?? '-' }}</td>
                            <td>{{ session('pLung')['copd'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Peep</td>
                            <td>{{ session('xLung')['peep'] ?? '-' }}</td>
                            <td>{{ session('pLung')['peep'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Trigger</td>
                            <td>{{ session('xLung')['trigger'] ?? '-' }}</td>
                            <td>{{ session('pLung')['trigger'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Sestivity</td>
                            <td>{{ session('xLung')['senstivity'] ?? '-' }}</td>
                            <td>{{ session('pLung')['senstivity'] ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div id="weather-temp">Session</div>
                    <p class="card-title">Cash deposits</p>
                    <p class="mb-4">To start a blog, think of a topic about and first brainstorm party is ways to write details</p>
                    <div id="cash-deposits-chart-legend" class="d-flex justify-content-center pt-3"></div>
                    <canvas id="cash-deposits-chart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-5 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Total sales</p>
                    <h1>$ 28835</h1>
                    <h4>Gross sales over the years</h4>
                    <p class="text-muted">Today, many people rely on computers to do homework, work, and create or store useful information. Therefore, it is important </p>
                    <div id="total-sales-chart-legend"></div>
                </div>
                <canvas id="total-sales-chart"></canvas>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="row mb-3" id="physioLung" onSubmit={this.submitChange}>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12 input-group input-group-sm mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-black-50" id="age">Age</span>
                                    </div>
                                    <input type="number" id="age" name="age" class="form-control" min="1" max="99" step="1" value={this.state.age} onChange={this.handleChange} aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <div class="col-md-12 input-group input-group-sm mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-black-50" id="height">Height</span>
                                    </div>
                                    <input type="number" id="height" name="height" class="form-control" min="101" max="200" step="0.1" value={this.state.height} onChange={this.handleChange} aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <div class="col-md-12 input-group input-group-sm mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-black-50" id="weight">Weight</span>
                                    </div>
                                    <input type="number" id="weight" name="weight" class="form-control" min="20" max="150" step="1" value={this.state.weight} onChange={this.handleChange} aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <div class="col-md-12 input-group input-group-sm mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-black-50" id="bmi">BMI</span>
                                    </div>
                                    <input type="number" id="bmi" name="bmi" class="form-control" min="1" max="99" step="1" value={this.state.bmi} onChange={this.handleChange} aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12 input-group input-group-sm mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-black-50" id="rva">RVA</span>
                                    </div>
                                    <input type="number" id="rva" name="rva" class="form-control" min="1" max="99" step="1" value={this.state.rva} onChange="{this.handleChange}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <div class="col-md-12 input-group input-group-sm mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-black-50" id="cst">CST</span>
                                    </div>
                                    <input type="number" id="cst" name="cst" class="form-control" min="80" max="200" step="0.1" value={this.state.cst} onChange="{this.handleChange}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <div class="col-md-12 input-group input-group-sm mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-black-50" id="vdvt">VD/VT</span>
                                    </div>
                                    <input type="number" id="vdvt" name="vdvt" class="form-control" min="0" max="150" step="0.1" value={this.state.vdvt} onChange="{this.handleChange}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <div class="col-md-12 input-group input-group-sm mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-black-50" id="shuntEff">Shunt Effect</span>
                                    </div>
                                    <input type="number" id="shuntEff" name="shuntEff" class="form-control" min="1" max="99" step="1" value={this.state.shuntEff} onChange="{this.handleChange}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12 input-group input-group-sm mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-black-50" id="pmus">PMUS</span>
                                    </div>
                                    <input type="number" id="pmus" name="pmus" class="form-control" min="1" max="99" step="1" value={this.state.pmus} onChange="{this.handleChange}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <div class="col-md-12 input-group input-group-sm mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-black-50" id="rrBpm">RR(bpm)</span>
                                    </div>
                                    <input type="number" id="rrBpm" name="rrBpm" class="form-control" min="1" max="200" step="1" value={this.state.rrBpm} onChange="{this.handleChange}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <div class="col-md-12 input-group input-group-sm mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-black-50" id="duration">Duration</span>
                                    </div>
                                    <input type="number" id="duration" name="duration" class="form-control" min="0" max="150" step="0.1" value={this.state.duration} onChange="{this.handleChange}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <div class="col-md-12 input-group input-group-sm mb-2"></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <img src="{{ asset("images/heart.gif") }}" alt="beating heart">
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-sm btn-success" onSubmit={this.submitChange}>Submit</button>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-md-4 col-12 table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                <tr>
                                    <td>RR(bpm)</td>
                                    <td id="rrbpm" class="text-right"><span class="badge badge-success">{this.state.rrbpm}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Insp. T</td>
                                    <td id="insp" class="text-right"><span class="badge badge-success">{this.state.insp}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Exp.T</td>
                                    <td id="expt" class="text-right"><span class="badge badge-success">{this.state.expt}</span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4 col-12 table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                <tr>
                                    <td>I:E</td>
                                    <td id="ieratio" class="text-right"><span class="badge badge-success">1:{this.state.ieRatio}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>VTi (ml)</td>
                                    <td id="vti" class="text-right"><span
                                            class="badge badge-success">{this.state.vti}</span></td>
                                </tr>
                                <tr>
                                    <td>VE (l/min)</td>
                                    <td id="veperminut" class="text-right"><span class="badge badge-success">{this.state.veperminut}</span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4 col-12 table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                <tr>
                                    <td>P0.1 (cmH2O)</td>
                                    <td id="po1" class="text-right"><span
                                            class="badge badge-success">{this.state.p01}</span></td>
                                </tr>
                                <tr>
                                    <td>PTP (cmH2O.s.m-1)</td>
                                    <td id="ptp" class="text-right"><span
                                            class="badge badge-success">{this.state.ptp}</span></td>
                                </tr>
                                <tr>
                                    <td>Work (Joules/l)</td>
                                    <td id="work" class="text-right"><span class="badge badge-success">{this.state.work}</span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('sidebar')
    @parent
    <li class="nav-item">
        <a class="nav-link" href="documentation/documentation.html">
            <i class="mdi mdi-file-document-box-outline menu-icon"></i>
            <span class="menu-title">Documentation</span>
        </a>
    </li>
@endsection
@section('scripts')
    <script src="{{ asset("js/chart.js") }}"></script>
    <script src="{{asset("js/data-table.js")}}"></script>
    <script src="{{ asset("js/dataTables.bootstrap4.js") }}"></script>

    <script src="{{ asset("js/dashboard.js") }}"></script>
    <script src="{{ asset("js/data-table.js") }}"></script>
    <script src="{{ asset("js/jquery.dataTables.js") }}"></script>
    <script src="{{ asset("js/dataTables.bootstrap4.js") }}"></script>
    <script>
        $.ajax({
            url: "/api/getWeather",
            data: {
                zipcode: 97201
            },
            success: function( result ) {
                $( "#weather-temp" ).html( "<strong>" + result + "</strong> degrees" );
            }
        });
    </script>
@endsection
