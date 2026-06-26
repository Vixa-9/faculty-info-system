<!DOCTYPE html>
<html lang="en">

<head>
    @include('head')
</head>

<body>
@include('header')


<!-- Breaking News Start -->
<div class="container-fluid mt-5 mb-3 pt-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <div class="section-title border-right-0 mb-0" style="width: 180px;">
                        <h4 class="m-0 text-uppercase font-weight-bold" style="font-size: medium">Featured News</h4>
                    </div>
                    <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center bg-white border border-left-0"
                         style="width: calc(100% - 180px); padding-right: 100px;">
                        <div class="text-truncate"><a class="text-secondary text-uppercase font-weight-semi-bold" href="">Lorem ipsum dolor sit amet elit. Proin interdum lacus eget ante tincidunt, sed faucibus nisl sodales</a></div>
                        <div class="text-truncate"><a class="text-secondary text-uppercase font-weight-semi-bold" href="">Lorem ipsum dolor sit amet elit. Proin interdum lacus eget ante tincidunt, sed faucibus nisl sodales</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breaking News End -->


<!-- News With Sidebar Start -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="bg-white border border-top-0 p-4">

                   <!-- Collapse Panel 1-->
                   <a data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="true" aria-controls="collapseExample1" class="btn btn-primary btn-block py-2 shadow-sm with-chevron" style="background: var(--blue)">
                      <p class="d-flex align-items-center justify-content-between mb-0 px-3 py-2"><strong class="text-uppercase" style="color: white">» Detailed Syllabus for the Information Technology Major
Submit feedback
Side panel
Diary
Saved
Other details

No details found for
the Information
Highlight the text to look up details later or open it in Google Search.</strong><i class="fa fa-angle-down" style="color: white"></i></p>
                    </a>
                    <div id="collapseExample1" class="collapse shadow-sm show">
                      <div class="card">
                        <div class="card-body">
                           <!-- Body Collapse Panel 1-->

                            <!-- Search -->
                            <div class="input-group">
                                <input type="search" class="form-control form-control-small" placeholder="Tìm kiếm">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-small btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>

                            <div>&nbsp;</div> 
                            <!-- End Search -->

                            <!-- Table -->
                            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;width: 5px;vertical-align: inherit">STT</th>
                                        <th style="text-align:center;width: 5px;vertical-align: inherit">Mã Học Phần</th>
                                        <th style="width: 150px;text-align:center;vertical-align: inherit">Tên Học Phần</th>
                                        <th style="text-align:center;width: 5px;vertical-align: inherit">Số Tín Chỉ</th>
                                        <th style="text-align:center;vertical-align: inherit; width: 150px">Ghi Chú</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                    <tr class="odd">
                                        <tr>
                                            <td class="dtr-control sorting_1" tabindex="0" style="text-align:center">1</td>
                                                <td style="text-align:center">00033</td>
                                                <td><a href="" style="text-align:center">Marxist-Leninist Philosophy</a></td>
                                                <td style="text-align:center">3</td>   
                                                <td style="text-align: center;width: 40px">Updated January 1, 2022</td> 
                                        </tr>
                                        <tr>
                                            <td class="dtr-control sorting_1" tabindex="0" style="text-align:center">2</td>
                                                <td style="text-align:center">00033</td>
                                                <td><a href="" style="text-align:center">Marxist-Leninist Philosophy</a></td>
                                                <td style="text-align:center">3</td>   
                                                <td style="text-align: center;width: 40px">Updated January 1, 2022</td> 
                                        </tr>
                                        <tr>
                                            <td class="dtr-control sorting_1" tabindex="0" style="text-align:center">3</td>
                                                <td style="text-align:center">00033</td>
                                                <td><a href="" style="text-align:center">Marxist-Leninist Philosophy</a></td>
                                                <td style="text-align:center">3</td>   
                                                <td style="text-align: center;width: 40px">Updated January 1, 2022</td> 
                                        </tr>
                                        <tr>
                                            <td class="dtr-control sorting_1" tabindex="0" style="text-align:center">4</td>
                                                <td style="text-align:center">00033</td>
                                                <td><a href="" style="text-align:center">Marxist-Leninist Philosophy</a></td>
                                                <td style="text-align:center">3</td>   
                                                <td style="text-align: center;width: 40px">Updated January 1, 2022</td> 
                                        </tr>        

                                    </tbody>
                        </div>
                            </table>
                            <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite" style="color:black">Showing 1 to 10 of 57 entries</div>
                                        </div><div class="col-sm-12 col-md-7">
                                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                                <ul class="pagination">
                                                    <li class="paginate_button page-item previous disabled" id="example2_previous">
                                                        <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                                    <li class="paginate_button page-item active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                                    <li class="paginate_button page-item next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                            <!-- End Tablbe -->

                           <!-- End Body Collapse Panel 1-->
                        </div>
                      </div>
                    </div>
                <!-- End Collapse Panel 1-->


                <!-- Collapse Panel 2-->
                   <a data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="true" aria-controls="collapseExample1" class="btn btn-primary btn-block py-2 shadow-sm with-chevron" style="background: var(--blue)">
                      <p class="d-flex align-items-center justify-content-between mb-0 px-3 py-2"><strong class="text-uppercase" style="color: white">» Đề cương chi tiết học phần Ngành Điện - Điện Tử</strong><i class="fa fa-angle-down" style="color: white"></i></p>
                    </a>
                    <div id="collapseExample1" class="collapse shadow-sm hidden">
                      <div class="card">
                        <div class="card-body">

                           <!-- Body Collapse Panel 2-->

                            <!-- Search -->
                            <div class="input-group">
                                <input type="search" class="form-control form-control-small" placeholder="Tìm kiếm">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-small btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>

                            <div>&nbsp;</div> 
                            <!-- End Search -->

                            <!-- Table -->
                            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;width: 5px;vertical-align: inherit">Numerical order</th>
                                        <th style="text-align:center;width: 5px;vertical-align: inherit">Course Code</th>
                                        <th style="width: 150px;text-align:center;vertical-align: inherit">Course Name</th>
                                        <th style="text-align:center;width: 5px;vertical-align: inherit">Number of Credits</th>
                                        <th style="text-align:center;vertical-align: inherit; width: 150px">Note</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                    <tr class="odd">
                                        <tr>
                                            <td class="dtr-control sorting_1" tabindex="0" style="text-align:center">1</td>
                                                <td style="text-align:center">00033</td>
                                                <td><a href="" style="text-align:center">Object-oriented programming</a></td>
                                                <td style="text-align:center">3</td>   
                                                <td style="text-align: center;width: 40px">Updated January 1, 2022</td> 
                                        </tr>
                                        <tr>
                                            <td class="dtr-control sorting_1" tabindex="0" style="text-align:center">2</td>
                                                <td style="text-align:center">00033</td>
                                                <td><a href="" style="text-align:center">Artificial intelligence infrastructure</a></td>
                                                <td style="text-align:center">3</td>   
                                                <td style="text-align: center;width: 40px">Updated January 1, 2022</td> 
                                        </tr>
                                        <tr>
                                            <td class="dtr-control sorting_1" tabindex="0" style="text-align:center">3</td>
                                                <td style="text-align:center">00033</td>
                                                <td><a href="" style="text-align:center">Sorfware testing</a></td>
                                                <td style="text-align:center">3</td>   
                                                <td style="text-align: center;width: 40px">Updated January 1, 2022</td> 
                                        </tr>
                                        <tr>
                                            <td class="dtr-control sorting_1" tabindex="0" style="text-align:center">4</td>
                                                <td style="text-align:center">00033</td>
                                                <td><a href="" style="text-align:center">Advanced database</a></td>
                                                <td style="text-align:center">3</td>   
                                                <td style="text-align: center;width: 40px">Updated January 1, 2022</td> 
                                        </tr>        

                                    </tbody>
                        </div>
                            </table>
                            <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite" style="color:black">Showing 1 to 10 of 57 entries</div>
                                        </div><div class="col-sm-12 col-md-7">
                                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                                <ul class="pagination">
                                                    <li class="paginate_button page-item previous disabled" id="example2_previous">
                                                        <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                                    <li class="paginate_button page-item active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                                    <li class="paginate_button page-item next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                            <!-- End Table -->

                           <!-- End Body Collapse Panel 2-->
                        </div>
                      </div>
                    </div>
                <!-- End Collapse Panel 2-->

                <!-- Collapse Panel 3-->
                   <a data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="true" aria-controls="collapseExample1" class="btn btn-primary btn-block py-2 shadow-sm with-chevron" style="background: var(--blue)">
                      <p class="d-flex align-items-center justify-content-between mb-0 px-3 py-2"><strong class="text-uppercase" style="color: white">» Đề cương chi tiết học phần Ngành Kỹ Thuật Cơ Khí</strong><i class="fa fa-angle-down" style="color: white"></i></p>
                    </a>
                    <div id="collapseExample1" class="collapse shadow-sm hidden">
                      <div class="card">
                        <div class="card-body">
                            
                           <!-- Body Collapse Panel 3-->

                            <!-- Search -->
                            <div class="input-group">
                                <input type="search" class="form-control form-control-small" placeholder="Tìm kiếm">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-small btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>

                            <div>&nbsp;</div> 
                            <!-- End Search -->

                            <!-- Table -->
                            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;width: 5px;vertical-align: inherit">STT</th>
                                        <th style="text-align:center;width: 5px;vertical-align: inherit">Mã Học Phần</th>
                                        <th style="width: 150px;text-align:center;vertical-align: inherit">Tên Học Phần</th>
                                        <th style="text-align:center;width: 5px;vertical-align: inherit">Số Tín Chỉ</th>
                                        <th style="text-align:center;vertical-align: inherit; width: 150px">Ghi Chú</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                    <tr class="odd">
                                        <tr>
                                            <td class="dtr-control sorting_1" tabindex="0" style="text-align:center">1</td>
                                                <td style="text-align:center">00033</td>
                                                <td><a href="" style="text-align:center">Triết học Mác-Lênin</a></td>
                                                <td style="text-align:center">3</td>   
                                                <td style="text-align: center;width: 40px">Cập nhật ngày 01-01-2022</td> 
                                        </tr>
                                        <tr>
                                            <td class="dtr-control sorting_1" tabindex="0" style="text-align:center">2</td>
                                                <td style="text-align:center">00033</td>
                                                <td><a href="" style="text-align:center">Triết học Mác-Lênin</a></td>
                                                <td style="text-align:center">3</td>   
                                                <td style="text-align: center;width: 40px">Cập nhật ngày 01-01-2022</td> 
                                        </tr>
                                        <tr>
                                            <td class="dtr-control sorting_1" tabindex="0" style="text-align:center">3</td>
                                                <td style="text-align:center">00033</td>
                                                <td><a href="" style="text-align:center">Triết học Mác-Lênin</a></td>
                                                <td style="text-align:center">3</td>   
                                                <td style="text-align: center;width: 40px">Cập nhật ngày 01-01-2022</td> 
                                        </tr>
                                        <tr>
                                            <td class="dtr-control sorting_1" tabindex="0" style="text-align:center">4</td>
                                                <td style="text-align:center">00033</td>
                                                <td><a href="" style="text-align:center">Triết học Mác-Lênin</a></td>
                                                <td style="text-align:center">3</td>   
                                                <td style="text-align: center;width: 40px">Cập nhật ngày 01-01-2022</td> 
                                        </tr>        

                                    </tbody>
                        </div>
                            </table>
                            <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite" style="color:black">Showing 1 to 10 of 57 entries</div>
                                        </div><div class="col-sm-12 col-md-7">
                                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                                <ul class="pagination">
                                                    <li class="paginate_button page-item previous disabled" id="example2_previous">
                                                        <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                                    <li class="paginate_button page-item active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                                    <li class="paginate_button page-item next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                            <!-- End Table -->

                           <!-- End Body Collapse Panel 3-->
                        </div>
                      </div>
                    </div>
                <!-- End Collapse Panel 3-->

                <!-- Collapse Panel 4-->
                   <a data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="true" aria-controls="collapseExample1" class="btn btn-primary btn-block py-2 shadow-sm with-chevron" style="background: var(--blue)">
                      <p class="d-flex align-items-center justify-content-between mb-0 px-3 py-2"><strong class="text-uppercase" style="color: white">» Đề cương chi tiết học phần Ngành Kỹ Thuật Xây Dựng</strong><i class="fa fa-angle-down" style="color: white"></i></p>
                    </a>
                    <div id="collapseExample1" class="collapse shadow-sm hidden">
                      <div class="card">
                        <div class="card-body">
                            
                           <!-- Body Collapse Panel 4-->

                            <!-- Search -->
                            <div class="input-group">
                                <input type="search" class="form-control form-control-small" placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-small btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>

                            <div>&nbsp;</div> 
                            <!-- End Search -->

                            <!-- Table -->
                            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;width: 5px;vertical-align: inherit">Numerical order</th>
                                        <th style="text-align:center;width: 5px;vertical-align: inherit">Course Code</th>
                                        <th style="width: 150px;text-align:center;vertical-align: inherit">Course Name</th>
                                        <th style="text-align:center;width: 5px;vertical-align: inherit">Number of Credits</th>
                                        <th style="text-align:center;vertical-align: inherit; width: 150px">Note</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                    <tr class="odd">
                                        <tr>
                                            <td class="dtr-control sorting_1" tabindex="0" style="text-align:center">1</td>
                                                <td style="text-align:center">00033</td>
                                                <td><a href="" style="text-align:center">Marxist-Leninist Philosophy</a></td>
                                                <td style="text-align:center">3</td>   
                                                <td style="text-align: center;width: 40px">Updated January 1, 2022</td> 
                                        </tr>
                                        <tr>
                                            <td class="dtr-control sorting_1" tabindex="0" style="text-align:center">2</td>
                                                <td style="text-align:center">00033</td>
                                                <td><a href="" style="text-align:center">Data structures and algorithms</a></td>
                                                <td style="text-align:center">3</td>   
                                                <td style="text-align: center;width: 40px">Updated January 1, 2022</td> 
                                        </tr>
                                        <tr>
                                            <td class="dtr-control sorting_1" tabindex="0" style="text-align:center">3</td>
                                                <td style="text-align:center">00033</td>
                                                <td><a href="" style="text-align:center">Software technology</a></td>
                                                <td style="text-align:center">3</td>   
                                                <td style="text-align: center;width: 40px">Updated January 1, 2022</td> 
                                        </tr>
                                        <tr>
                                            <td class="dtr-control sorting_1" tabindex="0" style="text-align:center">4</td>
                                                <td style="text-align:center">00033</td>
                                                <td><a href="" style="text-align:center">Web programming</a></td>
                                                <td style="text-align:center">3</td>   
                                                <td style="text-align: center;width: 40px">Updated January 1, 2022</td> 
                                        </tr>        

                                    </tbody>
                        </div>
                            </table>
                            <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite" style="color:black">Showing 1 to 10 of 57 entries</div>
                                        </div><div class="col-sm-12 col-md-7">
                                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                                <ul class="pagination">
                                                    <li class="paginate_button page-item previous disabled" id="example2_previous">
                                                        <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                                    <li class="paginate_button page-item active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                                    <li class="paginate_button page-item next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                            <!-- End Table -->

                           <!-- End Body Collapse Panel 4-->
                        </div>
                      </div>
                    </div>
                <!-- End Collapse Panel 4-->

                </div>

            </div>

            <div class="col-lg-4">
                <!-- Video Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Video</h4>
                    </div>
                    <div class="bg-white text-center border border-top-0 p-3">
                         <a href=""><img class="img-fluid" src="/template/img/news-800x500-2.jpg" alt=""></a>
                    </div>
                </div>
                <!-- Video End -->

                <!-- Thông Tin Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Information</h4>
                    </div>
                    <div class="bg-white text-center border border-top-0 p-3">
                        <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                            <img class="img-fluid" src="/template/img/news-110x110-1.jpg" alt="">
                            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">International Cooperation</a>
                                    <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                                </div>
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href=""></a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                            <img class="img-fluid" src="/template/img/news-110x110-2.jpg" alt="">
                            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Scholarship</a>
                                    <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                                </div>
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href=""></a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                            <img class="img-fluid" src="/template/img/news-110x110-3.jpg" alt="">
                            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Graduation internship</a>
                                    <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                                </div>
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href=""></a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                            <img class="img-fluid" src="/template/img/news-110x110-4.jpg" alt="">
                            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Student Club</a>
                                    <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                                </div>
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href=""></a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                            <img class="img-fluid" src="/template/img/news-110x110-5.jpg" alt="">
                            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Student support</a>
                                    <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                                </div>
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href=""></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Thông Tin End -->

                <!-- Liên Kết Trang Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Page Links</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-3">
                        <a href="https://accounts.google.com/signin" class="d-block w-100 text-white text-decoration-none mb-3" style="background: blue;">
                            <i class="fas fa-envelope text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                            <span class="font-weight-larger" style="color: #ffffdd; text-transform: uppercase; font-weight:bolder">Email</span>
                        </a>

                        <a href="http://dhtg.vpdttg.vn/" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #DC472E;">
                            <i class="fas fa-mail-bulk text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                            <span class="font-weight-larger" style="color: #ffffdd; text-transform: uppercase; font-weight:bolder">Electronic Office</span>
                        </a>

                        <a href="http://qldt.tgu.edu.vn/" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #52AAF4;">
                            <i  class="fas fa-book-reader text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                            <span class="font-weight-larger" style="color: #ffffdd; text-transform: uppercase; font-weight:bolder">Training management</span>
                        </a>
                        <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #C8359D;">
                            <i class="fas fa-university text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                            <span class="font-weight-larger" style="color: #ffffdd; text-transform: uppercase; font-weight:bolder">Library</span>
                        </a>
                    </div>
                </div>
                <!-- Liên Kết Trang End -->

                <!-- Lượt Truy Cập Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Website Visits</h4>
                    </div>
                    <div class="bg-white text-left border border-top-0 p-3">
                        <div>
                            <img class="img-fluid" src="/template/img/user2.png" alt="" style="width:20px; text-align: left">
                            <span style="color: blue; font-weight: bolder; text-align: left">Today</span>
                        </div>
                        <div>
                            <img class="img-fluid" src="/template/img/user3.png" alt="" style="width:20px; text-align: left">
                            <span style="color: blue; font-weight: bolder">This week</span>
                        </div>
                        <div>
                            <img class="img-fluid" src="/template/img/user4.png" alt="" style="width:20px; text-align: left">
                            <span  style="color: blue; font-weight: bolder">This month</span>
                        </div>
                        <div>
                            <img class="img-fluid" src="/template/img/statistic.png" alt="" style="width:20px; text-align: left">
                            <span style="color: blue; font-weight: bolder">Total visits</span>
                        </div>
                        <div style="color: blue; font-weight: bolder">
                            <img class="img-fluid" src="/template/img/user1.png" alt="" style="width:20px; text-align: left">Số người online:
                            <script type="text/javascript" src="//widget.supercounters.com/ssl/online_i.js"></script>
                            <script type="text/javascript" style="font-weight: bolder"> sc_online_i(1612095,"#ffffff","1100ff");</script>
                            <noscript><a href="http://www.supercounters.com/" class="disabled">Supercounters</a></noscript>
                        </div>
                    </div>
                </div>
                <!-- Lượt Truy Cập End -->

                <!-- Cac Website Lien Ket Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Linked Websites</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-3">
                        <div class="form-group" data-select2-id="73">
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option selected="selected" data-select2-id="3">Ministry of Education and Training</option>
                                <option data-select2-id="75">Tien Giang University</option>
                                <option data-select2-id="76">Can Tho University</option>
                                <option data-select2-id="77">Ho Chi Minh City National University</option>
                                <option data-select2-id="78">Hue University</option>
                                <option data-select2-id="79">Ho Chi Minh City University of Education</option>
                                <option data-select2-id="80">Tra Vinh University</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Cac Website Lien Ket End -->
            </div>
        </div>
    </div>
</div>
<!-- News With Sidebar End -->

@include('footer')
</body>

</html>

<style>
    .row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -0.5rem;
        margin-left: -0.5rem;
        align-content: flex-start;
        justify-content: center;
        align-items: flex-start;
        flex-direction: row;
    }

    body {
        margin: 0;
        font-family: "Montserrat", sans-serif;
        font-size: 1rem;
        font-weight: normal;
        line-height: 1.5;
        color: white;
        text-align: left;
        background-color: #EDEFF4;
    }
    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: var(--dark);
    }
    a {
        color: var(--dark);
        text-decoration: none;
        background-color: transparent;
    }

    a:link, a:visited {
    text-decoration: none;
    outline: none;
    color: black;
    }

    a:hover {
    color:gray;
    text-decoration:none;
    outline:none;
    }
    .input-group-append {
        margin-left: -1px;
        background-color: lightsteelblue;
    }

    .with-chevron[aria-expanded='true'] i {
      display: block;
      transform: rotate(180deg) !important;
    }

    body {
      min-height: 100vh;
      background-color: #fafafa;
    }
    .btn-info {
        color: #fff;
        background-color: var(--blue);
        border-color: #17a2b8;
    }

    .btn-info {
        color: #fff;
        background-color: var(--blue);
        border-color: #17a2b8;
    }

    .text-muted {
    color: var(--gray-dark) !important;
    }

   .with-chevron[aria-expanded='true'] i {
  display: block;
  transform: rotate(180deg) !important;
    }
    body {
  min-height: 100vh;
  background-color: #fafafa;
    }


.btn-primary {
    border-color: #ffcc0008;
}

</style>
<!-- DataTables  & Plugins -->
<script src="/template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/template/plugins/jszip/jszip.min.js"></script>
<script src="/template/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/template/plugins/pdfmake/vfs_fonts.js"></script>
<script src="./template/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/template/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/template/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="/template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/template/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>






    
    
