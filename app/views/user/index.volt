{% extends "layouts/main.volt" %}

{% block content_header %}
    <section class="content-header">
        <h1>
            Utilisateurs
            {#<small>preview of simple tables</small>#}
        </h1>
        <ol class="breadcrumb">
            <li>{{ link_to("", '<i class="fa fa-dashboard"></i> <span>Home</span>') }}</li>
            <li>{{ link_to("user/index", '<i class="fa fa-users"></i> <span>Utilisateurs</span>') }}</li>
        </ol>
    </section>
{% endblock %}

{% block content %}
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List des utilisateurs</h3>
                        {#<div class="box-tools">#}
                            {#<div class="input-group" style="width: 150px;">#}
                                {#<input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">#}
                                {#<div class="input-group-btn">#}
                                    {#<button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>#}
                                {#</div>#}
                            {#</div>#}
                        {#</div>#}
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover table-striped">
                            <tr>
                                <th>Id</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                <th>Clé GPG</th>
                            </tr>
                            {% set i = 0 %}
                            {% for user in aUser  %}
                                {% if i == 0 %}
                                    {% set i = 1 %}
                                    {% set class = 'odd' %}
                                {% else %}
                                    {% set i = 0 %}
                                    {% set class = 'even' %}
                                {% endif %}
                            <tr class="{{ class }}" >
                                <td>{{ user.getId() }}</td>
                                <td>{{ user.getFirstname() }}</td>
                                <td>{{ user.getLastname() }}</td>
                                <td>{{ user.getEmail() }}</td>
                                <td>{{ user.getUserGpg().count() }}</td>
                            </tr>
                            {% endfor %}
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section><!-- /.content -->
{% endblock %}


