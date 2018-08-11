<!-- begin #content -->
<div id="content" class="content">
    <!-- begin row -->
    <div class="row">
        <!-- begin col-3 -->
        <div class="col-md-12 col-sm-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-info-circle"></i></div>
                <div class="stats-info">
                    <p><i class="fa fa-list"></i> Auditoria</p>
                    <h4>&nbsp;</h4>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
    <!-- begin row -->
    <div class="row">
        <!-- begin col-10 -->
        <div class="col-md-12">
            <!-- begin panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">&nbsp;</h4>
                </div>
                <div class="panel-body">
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Entidade</th>
                            <th>Operação</th>
                            <th>Data</th>
                            <th>Hora</th>
                            <th>Autor</th>
                            <th>Ip</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php for ($i=0;$i<3;$i ++):?>
                            <tr class="odd gradeX text-center">
                                <td><?php echo $i+1?></td>
                                <td>processo,entradasaida</td>
                                <td>cadastro</td>
                                <td>12-03-2017</td>
                                <td>12:23</td>
                                <td>Sys Admin</td>
                                <td>192.168.98.1</td>
                            </tr>
                        <?php endfor;?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-10 -->
    </div>
    <!-- end row -->
</div>
<!-- end #content -->