
<?php
session_start();
?>

@if(!isset($_SESSION['Authenticated']))
    <script>
        window.location = '/404';
    </script>
@else

    @extends('../../template.adminTemplate.accountingTemplate');
    @section('title')
    Team Design
    @endsection

    @section('activePageName')
        New Ledger
    @endsection

    @section('custom-css')
        <link rel="stylesheet" href="lang/css/adminPanle/adminPanle.scss">
        <link rel="stylesheet" href="lang/css/accounting/accounting.scss">
        {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" /> --}}
    @endsection

    @section('custom-js')
        <script src="lang/js/adminPanle/adminPanle.js?cache=<?php echo time(); ?>"></script>

        <script type="text/javascript">
    @endsection


    @section('businessContent')

    <div class="content">
        <div class="container-fluid">
            <div class="">
                <div class="">
                    <nav aria-label="breadcrumb" role="navigation" class="mt-3">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:;">Ledger</a></li>
                            <li class="breadcrumb-item"><a href="javascript:;">New Ledger</a></li>

                        </ol>
                    </nav>

                    <div class="container-fluid w-75 mx-0">
                        <div class="row erpbg-info">
                            <div class="col-md-9 d-flex align-items-center p-4">

                                <input type="text" name="ledger_name" placeholder="Ledger Name" class="form-control">
                            </div>
                            <div class="col-md-3 p-4 border border-light border-right-0 border-top-0 border-bottom-0">
                                <p class="p-0 m-0 quicksand-font mb-2">Total Opening Balance</p>

                                <p class="p-0 m-0 quicksand-font">1000 Cr</p>
                                <p class="p-0 m-0 quicksand-font">Difference</p>
                                <div class="dropdown-divider border-light"></div>
                                <p class="p-0 m-0 quicksand-font">1000 Cr</p>
                            </div>
                            <div class="col-md-6 p-4 border border-light border-bottom-0 border-left-0">
                                <div class="d-flex align-items-baseline mb-4">
                                    <span class="p-0 m-0 quicksand-font">Under </span>
                                <select name="ledger_name" class="col-6 ml-3 p-1 flex-grow-1 border-0 bg-light quicksand-font custom-select">
                                    <option>Capital Account</option>
                                    <option>Capital Account</option>
                                    <option>Capital Account</option>
                                    <option>Capital Account</option>
                                </select>

                                </div>

                                <div class="d-flex align-items-baseline mb-5">
                                    <span class="p-0 m-0 quicksand-font">Processesed With </span>
                                <select name="ledger_name" class="col-6 ml-3 p-1 flex-grow-1 border-0 bg-light quicksand-font custom-select">
                                    <option>Without Documents</option>
                                    <option>Documents</option>
                                </select>
                                </div>

                                <div class="d-flex align-items-center mb-4">
                                    <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value="">
                                        Disable Address Field
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                    </div>
                                </div>

                                <div class="d-flex flex-column">
                                    <input type="text" name="ledger_name" class="form-control" placeholder="Area , Flat , Door Block No">
                                    <div class="row mt-3">
                                        <div class="col-6">
                                            <input type="text" name="ledger_name" class="form-control" placeholder="City">
                                        </div>
                                        <div class="col-6">
                                            <input type="number" name="ledger_name" class="form-control"placeholder="Pincode">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-6">
                                            <input type="text" name="ledger_name" class="form-control" placeholder="State">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" name="ledger_name" class="form-control"placeholder="Country">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 p-4 border border-light border-bottom-0 border-left-0 border-right-0">
                                <div class="without-documents">
                                    <div class="d-flex flex-column mb-4">
                                    <p class="p-0 m-0 quicksand-font">Primary Contact</p>
                                        <input type="text" name="ledger_name" class="form-control">
                                    </div>

                                    <div class="d-flex flex-column mb-4">
                                    <p class="p-0 m-0 quicksand-font">Secondary Contact</p>
                                        <input type="text" name="ledger_name" class="form-control">
                                    </div>

                                    <div class="d-flex flex-column mb-4">
                                    <p class="p-0 m-0 quicksand-font">Whats App</p>
                                        <input type="text" name="ledger_name" class="form-control">
                                    </div>

                                    <div class="d-flex flex-column mb-4">
                                    <p class="p-0 m-0 quicksand-font">Email Id</p>
                                        <input type="text" name="ledger_name" class="form-control">
                                    </div>

                                    <div class="d-flex flex-column">
                                    <p class="p-0 m-0 quicksand-font">Opening Date</p>
                                     <input type="date" name="ledger_name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 p-2 border border-light border-bottom-0 border-left-0 border-right-0 d-flex justify-content-center align-items-center">

                                <p class="p-0 m-0 quicksand-font">Opening Balance :</p>
                                <div class="btn-group ml-3">
                                    <input type="text" name="ledger_name" class="form-control">
                                    <input type="text" name="ledger_name" class="form-control mx-2" placeholder="Cr">
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

@endif
