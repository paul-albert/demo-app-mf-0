<div class="row">
    <div class="col-xs-6">
        <div class="form-group col-xs-12 text-right">
            <?= $form->field($model, 'additional_address_data')->textInput(['value' => $model->additional_address_data]); ?>
        </div>
        <div class="form-group col-xs-12 text-right">
            <?= $form->field($model, 'street')->textInput(['value' => $model->street]); ?>
        </div>
        <div class="form-group col-xs-12 text-right">
            <?= $form->field($model, 'zipcode')->textInput(['value' => $model->zipcode]); ?>
        </div>
        <div class="form-group col-xs-12 text-right">
            <?= $form->field($model, 'city')->textInput(['value' => $model->city]); ?>
        </div>
        <div class="form-group col-xs-12 text-right">
            &nbsp;
        </div>
        <div class="form-group col-xs-12 text-right">
            <?= $form->field($model, 'phone')->textInput(['value' => $model->phone]); ?>
        </div>
        <div class="form-group col-xs-12 text-right">
            <?= $form->field($model, 'mobphone')->textInput(['value' => $model->mobphone]); ?>
        </div>
        <div class="form-group col-xs-12 text-right">
            <?= $form->field($model, 'fax')->textInput(['value' => $model->fax]); ?>
        </div>
        <div class="form-group col-xs-12 text-right">
            <?= $form->field($model, 'email')->textInput(['value' => $model->email]); ?>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group col-xs-12">
            <div class="form-group col-xs-4">
                <?= $form->field($model, 'open_stall')->checkbox(['checked' => $model->open_stall]); ?>
            </div>
            <div class="form-group col-xs-4">
                <?= $form->field($model, 'stall')->checkbox(['checked' => $model->stall]); ?>
            </div>
            <div class="form-group col-xs-4">
                <?= $form->field($model, 'coupler')->checkbox(['checked' => $model->coupler]); ?>
            </div>
        </div>
        <div class="form-group col-xs-12 text-right">
            &nbsp;
        </div>
        <div class="form-group col-xs-12">
            <?=
            $form->field($model, 'additional_info')->textarea([
                'rows' => 10,
                'cols' => 53,
                'placeholder' => Yii::t('app', 'Other notes about client ...'),
                'value' => $model->additional_info,
            ])->label(false); 
            ?>
        </div>
        <div class="form-group col-xs-12 text-right">
            &nbsp;
        </div>
        <div class="form-group col-xs-12 text-right">
            <?= $form->field($model, 'vet')->textInput(['value' => $model->vet]); ?>
        </div>
        <div class="form-group col-xs-12 text-right">
            <?= $form->field($model, 'smith')->textInput(['value' => $model->smith]); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-6">
        <div class="form-group col-xs-12 text-right">
            &nbsp;
        </div>
        <div class="form-group col-xs-12 text-right">
            <?= $form->field($model, 'account_type_1')->textInput(['value' => $model->account_type_1]); ?>
        </div>
        <div class="form-group col-xs-12 text-right">
            <?= $form->field($model, 'owner_1')->textInput(['value' => $model->owner_1]); ?>
        </div>
        <div class="form-group col-xs-12 text-right">
            <?= $form->field($model, 'account_number_1')->textInput(['value' => $model->account_number_1]); ?>
        </div>
        <div class="form-group col-xs-12 text-right">
            <?= $form->field($model, 'banking_code_1')->textInput(['value' => $model->banking_code_1]); ?>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group col-xs-12 text-right">
            &nbsp;
        </div>
        <div class="form-group col-xs-12 text-right">
            <?= $form->field($model, 'account_type_2')->textInput(['value' => $model->account_type_2]); ?>
        </div>
        <div class="form-group col-xs-12 text-right">
            <?= $form->field($model, 'owner_2')->textInput(['value' => $model->owner_2]); ?>
        </div>
        <div class="form-group col-xs-12 text-right">
            <?= $form->field($model, 'account_number_2')->textInput(['value' => $model->account_number_2]); ?>
        </div>
        <div class="form-group col-xs-12 text-right">
            <?= $form->field($model, 'banking_code_2')->textInput(['value' => $model->banking_code_2]); ?>
        </div>
    </div>
</div>

