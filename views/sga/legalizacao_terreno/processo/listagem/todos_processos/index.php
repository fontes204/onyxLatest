<!-- begin #content -->
<div id="content" class="content">
    <!-- begin row -->
    <div class="row">
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-green">
                <div class="stats-icon"><i class="fa fa-arrow-circle-down"></i></div>
                <div class="stats-info">
                    <h4>Entradas</h4>
                    <p>3</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">Ver Detalhes <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-arrow-circle-up"></i></div>
                <div class="stats-info">
                    <h4>Saídas</h4>
                    <p>20</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">Ver Detalhes <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-red">
                <div class="stats-icon"><i class="fa fa-lock"></i></div>
                <div class="stats-info">
                    <h4>Pendentes</h4>
                    <p>00</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">Ver Detalhes <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-purple">
                <div class="stats-icon"><i class="fa fa-file-archive-o"></i></div>
                <div class="stats-info">
                    <h4>Todos Processos</h4>
                    <p>23</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">Ver Detalhes <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
    </div>
    <!-- end row -->
    <!-- begin row -->
    <div class="row">
        <!-- begin col-10 -->
        <div class="col-md-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Todos Processo</h4>
                </div>
                <div class="panel-body">
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Assunto</th>
                            <th>Destino</th>
                            <th>Data de Entrada</th>
                            <th>Opções</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php for ($i=0;$i<6;$i ++):?>
                        <tr class="odd gradeX text-center">
                            <td>Trident</td>
                            <td>Internet Explorer 4.0</td>
                            <td>Win 95+</td>
                            <td>4</td>
                            <td class="text-center">
                                <p>
                                    <a title="Eliminar" class="btn btn-danger btn-icon btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                                    <a title="Continuar" class="btn btn-primary btn-icon btn-circle btn-sm"><i class="fa fa-pencil"></i></a>
                                </p>
                            </td>
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