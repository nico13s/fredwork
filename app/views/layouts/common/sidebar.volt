<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                {{ image('dist/img/user2-160x160.jpg', "class": "img-circle", "alt" : "User Image")}}
            </div>
            <div class="pull-left info">
                <p>Fred Leger</p>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                {{ link_to("user/index", '<i class="fa fa-table"></i> <span>Users</span>') }}
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>