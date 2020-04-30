<?php $this->macros['input'] = function($__p = null) { if (isset($__p[0])) { $name = $__p[0]; } else { if (array_key_exists("name", $__p)) { $name = $__p["name"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'input' was called without parameter: name");  } } if (isset($__p[1])) { $placeholder = $__p[1]; } else { if (array_key_exists("placeholder", $__p)) { $placeholder = $__p["placeholder"]; } else { $placeholder = ''; } }  ?>
    <?php return $this->tag->textField([$name, 'class' => 'form-control', 'id' => $name, 'placeholder' => $placeholder]); ?><?php }; $this->macros['input'] = \Closure::bind($this->macros['input'], $this); ?><?php $this->macros['input_disabled'] = function($__p = null) { if (isset($__p[0])) { $name = $__p[0]; } else { if (array_key_exists("name", $__p)) { $name = $__p["name"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'input_disabled' was called without parameter: name");  } }  ?>
    <?php return $this->tag->textField([$name, 'class' => 'form-control disabled', 'id' => $name, 'disabled' => 'disabled']); ?><?php }; $this->macros['input_disabled'] = \Closure::bind($this->macros['input_disabled'], $this); ?>
<?= $this->flashSession->output() ?>

<div class="row">
    <div class="col-sm-12">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Generate Model</h3>
            </div>
            <div class="card-body">
                <form role="form" class="form-horizontal" name="generate-model" method="post" action="<?= $this->url->get($webtools_uri . '/models/generate') ?>">
                    <p>New model will be placed at: [<?= $model_path ?>]</p>

                    <div class="form-group">
                        <label for="namespace" class="col-sm-2 control-label">Namespace</label>
                        <div class="col-sm-10">
                            <?= $this->callMacro('input', ['namespace', 'eg. My\Awesome\Namespace']) ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="schema" class="col-sm-2 control-label">Schema</label>
                        <div class="col-sm-10">
                            <?= $this->callMacro('input', ['schema', 'Database name']) ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tableName" class="col-sm-2 control-label">Table name</label>
                        <div class="col-sm-10">
                            <?= $this->tag->selectStatic(['tableName', $tables, 'useEmpty' => false, 'id' => 'tableName', 'class' => 'form-control']) ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="basePath" class="col-sm-2 control-label">Project Root</label>
                        <div class="col-sm-10">
                            <?= $this->callMacro('input', ['basePath', 'The absolute path to the project']) ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="modelsDir" class="col-sm-2 control-label">Model Directory</label>
                        <div class="col-sm-10">
                            <?= $this->callMacro('input', ['modelsDir', 'The absolute path to the model directory']) ?>
                        </div>
                    </div>

                    <hr/>

                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label for="genSettersGetters"><?= $this->tag->checkField(['genSettersGetters', 'value' => 1, 'id' => 'genSettersGetters']) . ' Add setters and getters' ?></label>
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label for="foreignKeys"><?= $this->tag->checkField(['foreignKeys', 'value' => 1, 'id' => 'foreignKeys']) . ' Set foreign keys' ?></label>
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label for="defineRelations"><?= $this->tag->checkField(['defineRelations', 'value' => 1, 'id' => 'defineRelations']) . ' Define relations' ?></label>
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label for="mapcolumn"><?= $this->tag->checkField(['mapcolumn', 'value' => 1, 'id' => 'mapcolumn']) . ' Generate map columns' ?></label>
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label for="force"><?= $this->tag->checkField(['force', 'value' => 1, 'id' => 'force']) . ' Force' ?></label>
                        </div>
                    </div>

                    <hr/>
                    <?= $this->tag->submitButton(['Generate', 'class' => 'btn btn-success pull-right']) ?>
                </form>
            </div>
        </div>
    </div>
</div>
