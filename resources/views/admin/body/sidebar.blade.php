<div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    
                        
                 
                    <li class="nav-label">Admin Settings</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-note menu-icon"></i> <span class="nav-text">Manage Profile</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('admin.password.reset') }}">Change Password</a></li>
                            <li><a href="{{ route('admin.profile') }}">Edit Profile</a></li>
                        </ul>
                    </li>
                   
                   <li class="nav-label">Management Tools</li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-note menu-icon"></i> <span class="nav-text">Balance</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('admin.balance.add') }}">Add Balance</a></li>
                            <li><a href="{{ route('admin.balance.show') }}">All Balance</a></li>
                            <li><a href="{{ route('admin.balance.balancesheet') }}">Balance Sheet</a></li>
                          
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i> <span class="nav-text">Stock</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('admin.stock.product.add') }}">Add Product</a></li>
                             <li><a href="{{ route('admin.stock.product.show') }}">All Products</a></li>
                            <li><a href="{{ route('admin.stock.add') }}">Add Stock In</a></li>
                           <li><a href="{{ route('admin.stock.out') }}">Add Stock Out</a></li>
                        
                          
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-basket"></i> <span class="nav-text">Purchase</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('admin.purchase.add') }}">Add Purchase</a></li>
                            <li><a href="{{ route('admin.purchase.show') }}">All Purchase</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i> <span class="nav-text">Branch</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('admin.branch.add') }}">Add Branch</a></li>
                            <li><a href="{{ route('admin.branch.show') }}">All Branch</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-grid menu-icon"></i> <span class="nav-text">Ledger</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('admin.ledger.add') }}">Add Ledger</a></li>
                            <li><a href="{{ route('admin.ledger.show') }}">All Ledger</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i> <span class="nav-text">Payment</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('admin.payment.add') }}">Add Payment</a></li>
                            <li><a href="{{ route('admin.payment.show') }}">All Payment</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-note menu-icon"></i> <span class="nav-text">Reciept</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('admin.reciept.add') }}">Add Reciept</a></li>
                            <li><a href="{{ route('admin.reciept.show') }}">All Reciept</a></li>
                        </ul>
                    </li>

                     <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-grid menu-icon"></i> <span class="nav-text">Balance Sheet</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('admin.report.show') }}">Total report</a></li>
                        </ul>
                    </li>


                </ul>
            </div>
        </div>


