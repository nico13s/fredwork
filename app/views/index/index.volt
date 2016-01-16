{% extends "layouts/main.volt" %}

{% block content_header %}
    <section class="content-header">
        <h1>Dashboard</h1>
    </section>
{% endblock %}

{% block content %}
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-users"><i class="fa fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Nb Users</span>
                        <span class="info-box-number">{{ countProfiles }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
    </section><!-- /.content -->
{% endblock %}


