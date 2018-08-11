<?php
$dao=new Database();
$att=new Atributo();
$dadosPrc=$dao->listarPorId('processo',base64_decode($att->getParam()))->fetchObject();
$zona=$dao->listarTodos('zona')->fetchAll(2);
?>
<div id="content" class="content">
    <div class="row">
        <!-- begin col-3 -->
        <div class="col-md-12 col-sm-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-info-circle"></i></div>
                <div class="stats-info">
                    <p><i class="fa fa-map-pin"></i> Cadastrar Terreno</p>
                    <h4>&nbsp;</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">&nbsp;</h4>
        </div>
        <div class="panel-body">
            <form action="<?php echo URL?>" id="" class="frm-captura-coords" method="POST" data-parsley-validate="true" name="form-wizard">
                <div id="wizard">
                    <ol style="font-family: Verdana, Arial, sans-serif">
                        <li>
                           Dados do Terreno
                        </li>
                        <li>
                            Capturar Vértices
                        </li>
                    </ol>
                    <!-- begin wizard step-1 -->
                    <div class="wizard-step-1">
                        <fieldset>
                            <!-- begin row -->
                            <div class="row">
                                <!-- begin col-4 -->
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Selecione a zona</label>
                                        <select class="default-select2 form-control id_zona" name="zona">
                                            <?php foreach ($zona as  $res):?>
                                                <option value="<?php echo $res['_id'];?>"><?php echo $res['_nome']?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                                <!-- end col-4 -->
                                <!-- begin col-4 -->
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Bloco</label>
                                        <input type="text" name="bloco" value=""  placeholder="BP" class="form-control bloco" data-parsley-group="wizard-step-1" required data-parsley-required="true" />
                                    </div>
                                </div>
                                <!-- end col-4 -->
                                <!-- begin col-4 -->
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Quarteirão/Sector</label>

                                        <input type="text" value="" name="quarteirao"  placeholder="BP1" class="form-control quarteirao" data-parsley-group="wizard-step-1" required data-parsley-required="true" />
                                    </div>
                                </div>
                                <!-- end col-4 -->
                                <!-- end col-4 -->
                                <!-- begin col-4 -->
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Lote</label>
                                        <input type="text" name="areaTerreno" value="" placeholder="129" class="form-control lote" data-parsley-group="wizard-step-1" required data-parsley-required="true" />
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-md-offset-2">Área do Terreno</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="areaTerreno" value="" placeholder="L" onkeypress='return numeros(event)' class="form-control areaTerreno largura" data-parsley-group="wizard-step-1" required data-parsley-required="true" />
                                            </div>
                                        </div>
                                        <span class="col-md-push-5 m-t-5 m-b-10 text-primary" style="position: absolute">X</span>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="areaTerreno" value="" placeholder="C" onkeypress='return numeros(event)' class="form-control areaTerreno comprimento" data-parsley-group="wizard-step-1" required data-parsley-required="true" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Número de Vértices</label>
                                        <input type="number" min="3" max="7" class="form-control numVertice" onkeypress='return numeros(event)' name="numVertice" id="numVertice" placeholder="Número de Vértices" data-parsley-group="wizard-step-1" required data-parsley-required="true">
                                    </div>
                                </div>
                                <!-- end col-4 -->
                            </div>
                            <!-- end row -->
                        </fieldset>
                    </div>
                    <!-- end wizard step-1 -->
                    <div class="wizard-step-4 dados_tereno" id_requerente="<?php echo $dadosPrc->_id_requerente?>">
                        <fieldset>
                            <div class="row agregador-input"></div>
                            <!-- end row -->
                        </fieldset>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end #content -->