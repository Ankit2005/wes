
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
    Stocks
    @endsection

    @section('activePageName')
        Stocks
    @endsection

    @section('custom-css')
        {{-- <link rel="stylesheet" href="lang/css/adminPanle/adminPanle.scss"> --}}
        <link rel="stylesheet" href="lang/css/accounting/accounting.scss">
        {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" /> --}}
    @endsection

    @section('custom-js')
        <script src="lang/js/accounting/inventory/stocks.js?cache=<?php echo time(); ?>"></script>

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
                            <li class="breadcrumb-item"><a href="javascript:;">Stocks</a></li>
                        </ol>
                    </nav>

                    <div class="mx-0">
                        <div class="card bg-grey">
                        <div class="card-header card-header-tabs card-header-primary">
                            <div class="nav-tabs-navigation">

                                <div class="nav-tabs-wrapper">
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#new-stocks" data-toggle="tab">
                                                <i class="material-icons">groups</i> Team List
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link add-role" href="#tab2" data-toggle="tab">
                                                <i class="material-icons">add</i> Add Role
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#tab3" data-toggle="tab">
                                                <i class="material-icons">cloud</i> Add New Team
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item py-2 text-right">
                                            <a class="pl-2">Total : <span class="badge badge-info total-team">0</span></a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body position-relative">
                            <div class="tab-content">
                                <div class="tab-pane active" id="new-stocks">
                                    <div class="row my-2 w-100">
                                        <div class="col-3">
                                            <select class="custom-select bg-dark text-light select-product">
                                                <option>Physical Product</option>
                                                <option>Digital Product</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="w-100 text-danger">
                                        <div class="phsical-product">
                                                <div class="card">
                                                    <div class="card-header card-header-text card-header-primary">
                                                        <div class="card-text">
                                                        <h4 class="card-title">Phsical Product</h4>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 p-0">
                                                            <div class="card-body">
                                                            <form class="p-4 border shadow-sm">
                                                                <div class="form-group quicksand-font">
                                                                    <label>Product Name</label>
                                                                    <input type="text" name="product_name" class="form-control rounded-0" required>
                                                                </div>

                                                                <div class="form-group quicksand-font">
                                                                    <label>Product Description</label>
                                                                    <textarea type="text" name="product_description" class="form-control rounded-0" required>
                                                                    </textarea>
                                                                </div>

                                                                <div class="form-group quicksand-font">
                                                                    <label>Under Group</label>
                                                                    <select type="text" name="under_group" class="form-control rounded-0 select-category-list">

                                                                    </select>
                                                                </div>

                                                                <div class="form-group quicksand-font">
                                                                    <label>Unit Of Measure</label>
                                                                    <select type="text" name="unit_of_measure" class="form-control rounded-0">
                                                                        <option>Pc</option>
                                                                        <option>Kg</option>
                                                                        <option>Lt</option>
                                                                        <option>Gm</option>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group quicksand-font">
                                                                    <label>Quantity</label>
                                                                    <input type="number" name="quantity" class="form-control rounded-0" required>
                                                                </div>

                                                                <div class="form-group quicksand-font">
                                                                    <label>Rate</label>
                                                                    <input type="number" name="rate" class="form-control rounded-0" required>
                                                                </div>

                                                                <div class="form-group quicksand-font">
                                                                    <div class="d-flex justify-content-between">
                                                                        <label>Click And Select Product Images</label>
                                                                        <span class="material-icons" data-toggle="tooltip" data-placement="top" title="Select Image File">add</span>
                                                                    </div>
                                                                    <input type='file' class="z-in product-images" accept="image/*" multiple="multiple" />

                                                                        {{--  <input type="file" name="product_images[]" class="z-in form-control rounded-0 product-images" accept="image/*" multiple="multiple" required> --}}

                                                                </div>

                                                                <div class="form-group quicksand-font product-images-preview">
                                                                    <div class="row" id="showProductImg">
                                                                        <div class="col-6 p-1">
                                                                            <img id="proImg1" class="w-100" src="{{url('/img/faces/download.png')}}" data-toggle="tooltip" data-placement="top" title="" alt="Image"/>
                                                                        </div>
                                                                        <div class="col-6 p-1">
                                                                            <img id="proImg2" class="w-100" src="{{url('/img/faces/download.png')}}" alt="Image"/>
                                                                        </div>
                                                                        <div class="col-6  p-1">
                                                                            <img id="proImg3" class="w-100" src="{{url('/img/faces/download.png')}}" alt="Image"/>
                                                                        </div>
                                                                        <div class="col-6  p-1">
                                                                            <img id="proImg4" class="w-100" src="{{url('/img/faces/download.png')}}" alt="Image"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class=" d-none only-select-img " role="alert">
                                                                        <div class="d-flex align-items-center text-danger">
                                                                            <span class="material-icons">report_off</span>
                                                                            <b class=" font-weight-bold mx-2"> Only Select Image Files</b>
                                                                        </div>
                                                                     </div>
                                                                </div>

                                                                <div class="form-group quicksand-font mt-4">
                                                                    <button class="btn erpbg-primary rounded-0 text-white" type="submit">
                                                                        Add To Stocks
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        </div>
                                                        <div class="col-md-6 p-0">
                                                            <div class="card-body">
                                                                <form class="quicksand-font border p-4 shadow-sm add-physical-product-category-group">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label>Create Groups</label>
                                                                        <input type="text" name="group_name" class="form-control rounded-0" placeholder="Enter Group Name Ex:- Mobile" required="required">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <select name="under_group" class="form-control rounded-0 select-category-list">
                                                                            <option>Primary</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <button class="btn erpbg-primary text-white rounded-0" type="submit">
                                                                            Add Group
                                                                        </button>

                                                                        <div class="cateory-notfound-alert d-none latter-space text-warning w-100 p-2 font-weight-bold animate__animated animate__flash animate__infinite	infinite animate__slow	3s"><b>Please Create Category</b></div>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="digital-product d-none">
                                             <div class="card">
                                                <div class="card-header card-header-text card-header-primary">
                                                    <div class="card-text">
                                                        <h4 class="card-title">digital pro</h4>
                                                     </div>
                                                </div>
                                                <div class="card-body">
                                                        The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona...
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane" id="tab2">

                                </div>
                                <div class="tab-pane" id="tab3">

                                </div>
                            </div>
                            <div class="card-footer m-0">
                            <div class="stats">
                                <nav class="team-pagination" aria-label="..."></nav>
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
