<?php
$procDao=new Database();
$att=new Atributo();
$hlp=new Helper();
$campo=array('r.*, p._id');
$tabela='requerente r, processo p';
$condicao='p._id_requerente=r._id and r._id=?';
$valor=array(base64_decode($att->getParam()));
$rs=$procDao->buscaExaustiva($campo,$tabela,$condicao,$valor)->fetchObject();

if($rs->_tipo=="cidadao") {
    $docFalta = $procDao->docFalta1($valor)->fetchAll();
    $docFalta1 = $procDao->docFalta1($valor)->fetchAll();
    $docDado = $procDao->docDado($valor)->fetchAll();

    $docFalta = $procDao->docFalta1($valor);
    $ctrlLocation = $docFalta->rowCount();
    if ($ctrlLocation == 0) {
        echo "<script>window.location='/onyx/secretariaGeral/saidaCidadao'</script>";
    }
}else{
    $docFalta = $procDao->docFalta($valor)->fetchAll();
    $docFalta1 = $procDao->docFalta($valor)->fetchAll();
    $docDado = $procDao->docDado($valor)->fetchAll();

    $docFalta = $procDao->docFalta($valor);
    $ctrlLocation = $docFalta->rowCount();
    if ($ctrlLocation == 0) {
        echo "<script>window.location='/onyx/secretariaGeral/saidaCidadao'</script>";
    }
}

$fa='';
$cont=0;
$cont1=0;

$campo = array('_id_requerente,_num_processoGeral');
$tabela = 'processo p';
$condicao = 'p._id=?';
$valor = array(base64_decode($att->getParam()));
$rs = $procDao->buscaExaustiva($campo, $tabela, $condicao, $valor)->fetchObject();

$dadosReq = $procDao->listarPorId('requerente', $rs->_id_requerente)->fetchObject();

$campo = array('_id');
$tabela = 'documento d';
$condicao = 'd._nome=?';
$valor = array("Fotografia");
$rx = $procDao->buscaExaustiva($campo, $tabela, $condicao, $valor)->fetchObject();

$campo = array('_foto');
$tabela = 'documento_processo dp';
$condicao = 'dp._id_processo=? and dp._id_documento=?';
$valor = array(base64_decode($att->getParam()), $rx->_id);
$rk = $procDao->buscaExaustiva($campo, $tabela, $condicao, $valor)->fetchObject();

$campo=array('*');
$tabela='entradasaida es';
$condicao='es._id_processo=? and _descOrg=? or(_descOrg=? and _descDest=?) ORDER BY _id ASC LIMIT 1';
$valor=array(base64_decode($att->getParam()),"saida","pendente","pendente");
$rd=$procDao->buscaExaustiva($campo,$tabela,$condicao,$valor)->fetchObject();
?>
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin row -->
    <div class="row">
        <!-- begin col-3 -->
        <div class="col-md-12 col-sm-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-info-circle"></i></div>
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
        <div class="col-md-9">
            <!-- begin panel -->
            <div class="profile-container">
                <div class="profile-section">
                    <!-- begin profile-left -->
                    <div class="profile-left">
                        <!-- begin profile-image -->
                        <div class="profile-image" style="border: none">
                            <img class="img-thumbnail" style="width: inherit;height: inherit"
                                 src="<?php echo URL ?>resources/documentos/<?php echo $rk->_foto ?>"/>
                            <i class="fa fa-user hide"></i>
                        </div>
                    </div>
                    <!-- end profile-left -->
                    <!-- begin profile-right -->
                    <div class="profile-right">
                        <!-- begin profile-info -->
                        <div class="profile-info">
                            <!-- begin table -->
                            <div class="table-responsivse" style="border-left: 1px">
                                <span class="f-s-12">
                                    <i class="fa fa-clock-o"></i> Tempo de espera: <span
                                    class="text-primary"><?php echo substr($hlp->tempoEspera($rd->_data, date('Y-m-d')), 1) ?></span>
                                </span>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <?php foreach ($docFalta as $res):
                                            $cont+=1;
                                            ?>
                                        <th><?php echo $res->_nome?></th>
                                        <?php endforeach;
                                            if($cont==1){
                                        ?>
                                            <th>&nbsp;</th>
                                            <th>&nbsp;</th>
                                            <th>&nbsp;</th>
                                        <?php }elseif($cont==2){?>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                        <?php }elseif($cont==3){?>
                                                <th>&nbsp;</th>
                                        <?php }?>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <ul class="list-inline col-md-push-1">
                                        <?php foreach ($docFalta1 as $res):
                                            $cont1 +=1;
                                            if($res->_id==1)
                                            {
                                                $fa='fa fa-list-alt';
                                            }elseif ($res->_id==2)
                                            {
                                                $fa='fa fa-map-o';
                                            }elseif ($res->_id==3)
                                            {
                                                $fa='fa fa-list-alt';
                                            }else
                                            {
                                                $fa='fa fa-picture-o';;
                                            }
                                            ?>
                                        <td>
                                            <li style="list-style: none" class="btn-check btn-xs list-group list-group-lg no-radius" indice="<?php echo $cont1?>">
                                                <input type="checkbox" class="documento input-xs" value="<?php echo $res->_id?>"  data-render="switchery" data-theme="default" name="" />
                                                <span class="agrega-input-file<?php echo $cont1?>">
                                                    <span class="btn btn-primary btn-xs btn-group-xs fileinput-button del-files<?php echo $cont1?>"> <i class="fa fa-picture-o"></i><input type="file" accept="image/*" cont="<?php echo $cont1?>" name="image" id="images" class="input-xs form-control"></span>
                                                    <br><span class="text-center" id="image-span<?php echo $cont1?>"></span>
                                                </span>
                                            </li>

                                        </td>
                                        <?php endforeach;?>
                                        </ul>
                                        <input type="hidden" value="<?echo base64_decode($att->getParam())?>" class="id_proc">
                                    </tr>
                                    <hr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table -->
                        </div>
                        <!-- end profile-info -->
                    </div>

                    <div class="panel-footer">
                        <a href="javascript:window.history.go(-1)" title="Voltar" class="btn btn-sm btn-default">Voltar</a>
                        <button type="submit" class="btn btn-sm btn-primary col-sm-offset-2 pull-right add-doc-processo" disabled><i class="fa fa-save"></i> Confirmar</button>
                    </div>
                    <!-- end profile-right -->
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-10 -->
        <div class="col-md-3">
            <div class="panel panel-primary" data-sortable-id="index-9">
                <div class="panel-heading">
                    <h4 class="panel-title">Documento(s) préviamente apresentados</h4>
                </div>
                <div class="panel-body p-0 image gallery-group-1">
                    <ul class="todolist">
                        <?php foreach ($docDado as $res):
                            $campo = array('dp._foto');
                            $idDoc = array($res->_id, base64_decode($att->getParam()));
                            $foto = $procDao->buscaExaustiva($campo, 'documento_processo dp', '_id_documento=? and _id_processo=?', $idDoc)->fetchAll(2);
                            foreach ($foto as $ft):
                                if ($res->_nome == "Requerimento")
                                    $fa = 'fa fa-list-alt';
                                elseif ($res->_nome == "Croqu&iacute;s de Localização")
                                    $fa = 'fa fa-map-o';
                                elseif ($res->_nome == "Bilhete de Identidade")
                                    $fa = 'fa fa-list-alt';
                                elseif ($res->_nome == "Fotografia")
                                    $fa = 'fa fa-picture-o';
                                ?>
                                <li>
                                    <a href="<?php echo URL ?>resources/documentos/<?php echo $ft['_foto'] ?>"
                                       class="todolist-container" data-lightbox="gallery-group-1">
                                        <div class="todolist-input"><i class="<?php echo $fa ?> text-primary"></i>
                                        </div>
                                        <div class="todolist-title"><?php echo $res->_nome ?></div>
                                    </a>
                                </li>
                            <?php endforeach;
                        endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
<!-- end #content -->