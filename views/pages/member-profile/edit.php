<?php

use App\View\View;
use App\View\Form;
use App\View\FormField;
?>
<div class="main-header">
    <h1><i class="fa fa-edit"></i> Edit Profil</h1>
</div>

<?php echo View::renderFlashMessages(); ?>

<div class="row">
    <div class="col-lg-9">
        <div class="panel panel-default panel-section">
            <div class="panel-heading">
                <div class="panel-title"><i class="fa fa-pencil panel-icon"></i> Edit Profile</div>
            </div>
            <div class="panel-body">
                <?php
                $field_nama = new FormField( 'Nama Lengkap', 'text', 'name', $data[ 'user' ][ 'name' ], 'Nama Lengkap' );
                $field_nama->isRequired( TRUE );

                $field_telp = new FormField( 'Telp./HP', 'text', 'phone', $data[ 'user' ][ 'phone' ], 'No Telp / HP' );
                $field_telp->isRequired( TRUE );

                $field_address = new FormField( 'Alamat', 'textarea', 'address', $data[ 'user' ][ 'address' ], 'Alamat Lengkap' );
                $field_address->isRequired( TRUE );

                $form = new Form( 'profile-form', 'POST', './?p=profile-save', 'form-horizontal' );
                $form->addField( $field_nama );
                $form->addField( $field_telp );
                $form->addField( $field_address );
                $form->render();
                ?>

            </div>
        </div>
    </div>
</div>
