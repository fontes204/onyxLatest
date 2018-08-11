<?php
    $att=new Atributo();
    $relatorio=new RelatorioDao();
    $campo = array('_id_requerente,_num_processoGeral');
    $tabela = 'processo p';
    $condicao = 'p._id=?';
    $valor = array(base64_decode($att->getParam()));
    $rs = $relatorio->buscaExaustiva($campo, $tabela, $condicao, $valor)->fetchObject();

    $dadosReq = $relatorio->listarPorId('requerente', $rs->_id_requerente)->fetchObject();
?>
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin row -->
    <div class="row">
        <!-- begin col-3 -->
        <div class="col-md-12 col-sm-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-edit"></i></div>
                <div class="stats-info">
                    <p><i class="fa fa-user"></i> <?php echo $dadosReq->_nome ?></p>
                    <h4><i class="fa fa-file-text"></i> n&ordm;: <?php echo $rs->_num_processoGeral ?></h4>
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
            <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Relatório Técnico</h4>
            </div>
            <div class="vertical-box">
                        <div class="p-30 bg-white">
                            <!-- begin email form -->
                            <div class="panel-body panel-form">
                                <form class="form-horizontal form-bordered frm-confrotacao">
                                    <div class="form-group">
                                        <label class="control-label col-md-1">NORDESTE</label>
                                        <div class="col-md-11">
                                            <div class="row row-space-10">
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control"  name="nordeste1" id="" />
                                                </div>
                                                <div class="col-md-1">
                                                    <select class="form-control selectpicker" name="nordeste2" title="tendo o ponto" data-size="10" data-style="btn-white">
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="C">C</option>
                                                        <option value="D">D</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="text" name="nordeste3" class="form-control"  id="" />
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="text" name="nordeste4" class="form-control"  id="" />
                                                </div>
                                                <div class="col-md-1">
                                                    <select class="form-control selectpicker" name="nordeste5" title="e o ponto" data-size="10" data-style="btn-white">
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="C">C</option>
                                                        <option value="D">D</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="text" name="nordeste6" class="form-control"  id="" />
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="text" name="nordeste7" class="form-control"  id="" />
                                                </div>
                                                <div class="col-md-3 text-center">
                                                    <input type="text" name="nordeste8" class="form-control"  id="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-1">SUDESTE</label>
                                        <div class="col-md-11">
                                            <div class="row row-space-10">
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control" name="sudeste1" id="" />
                                                </div>
                                                <div class="col-md-1">
                                                    <select class="form-control selectpicker" name="sudeste2" title="tendo o ponto" data-size="10" data-style="btn-white">
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="C">C</option>
                                                        <option value="D">D</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="text" class="form-control" name="sudeste3"  id="" />
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="text" class="form-control" name="sudeste4" id="" />
                                                </div>
                                                <div class="col-md-1">
                                                    <select class="form-control selectpicker" name="sudeste5" title="e o ponto" data-size="10" data-style="btn-white">
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="C">C</option>
                                                        <option value="D">D</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="text" class="form-control" name="sudeste6"  id="" />
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="text" class="form-control" name="sudeste7"  id="" />
                                                </div>
                                                <div class="col-md-3 text-center">
                                                    <input type="text" class="form-control" name="sudeste8" id="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-1">SUDOESTE</label>
                                        <div class="col-md-11">
                                            <div class="row row-space-10">
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control" name="sudoeste1" id="" />
                                                </div>
                                                <div class="col-md-1">
                                                    <select class="form-control selectpicker" name="sudoeste2" title="tendo o ponto" data-size="10" data-style="btn-white">
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="C">C</option>
                                                        <option value="D">D</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="text" class="form-control" name="sudoeste3" id="" />
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="text" class="form-control" name="sudoeste4"  id="" />
                                                </div>
                                                <div class="col-md-1">
                                                    <select class="form-control selectpicker" name="sudoeste5" title="e o ponto" data-size="10" data-style="btn-white">
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="C">C</option>
                                                        <option value="D">D</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="text" class="form-control" name="sudoeste6" id="" />
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="text" class="form-control" name="sudoeste7"  id="" />
                                                </div>
                                                <div class="col-md-3 text-center">
                                                    <input type="text" class="form-control"  name="sudoeste8" id="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-1">NOROESTE</label>
                                        <div class="col-md-11">
                                            <div class="row row-space-10">
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control" name="noroeste1" id="" />
                                                </div>
                                                <div class="col-md-1">
                                                    <select class="form-control selectpicker" name="noroeste2" title="tendo o ponto" data-size="10" data-style="btn-white">
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="C">C</option>
                                                        <option value="D">D</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="text" class="form-control" name="noroeste3"  id="" />
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="text" class="form-control"  name="noroeste4" id="" />
                                                </div>
                                                <div class="col-md-1">
                                                    <select class="form-control selectpicker" name="noroeste5" title="e o ponto" data-size="10" data-style="btn-white">
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="C">C</option>
                                                        <option value="D">D</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="text" class="form-control" name="noroeste6"  id="" />
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="text" class="form-control"  name="noroeste7"  id="" />
                                                </div>
                                                <div class="col-md-3 text-center">
                                                    <input type="text" class="form-control"  name="noroeste8"  id="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            </div>
                                <label class="control-labels">OBSERVAÇÃO:</label>
                                <div class="m-b-15">
                                    <textarea class="textarea form-control" name="observacao" style="resize: none" placeholder="" rows="8"></textarea>
                                </div>
                            <input type="hidden" name="id_processo" class="id_processo" valor="<?php echo ($att->getParam())?>" value="<?php echo base64_decode($att->getParam())?>">
                            </form>
                                <!-- end email content -->
                            <!-- end email form -->
                            <div class="panel-footer">
                                <a href="<?php echo URL?>tecnico/processo/<?php echo ($att->getParam())?>" class="btn btn-default p-l-40 p-r-40">Voltar</a>
                                <?php if($relatorio->numRelatorio(base64_decode($att->getParam()))==0)
                                            $dis="";
                                        else
                                            $dis="disabled";
                                    ?>
                                <button type="submit" <?php echo $dis?> class="pull-right btn btn-primary p-l-40 p-r-40 btn-criar-relatorio-tec">Criar</button>
                            </div>
                        </div>
            </div>
            <!-- end panel -->
        </div>
        </div>
        <!-- end col-10 -->
    </div>
    <!-- end row -->
</div>
<!-- end #content -->