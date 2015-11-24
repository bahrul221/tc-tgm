<div class="main-header">
    <h1><i class="fa fa-user"></i> Profil</h1>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default panel-section">
            <div class="panel-heading">
                <div class="panel-title"><i class="fa fa-sitemap panel-icon"></i> Community</div>
            </div>
            <div class="panel-body">
                <div class="user-info-panel">
                    <ul class="ul-untyled ul-list">
                        <li>
                            <div class="badge-level-wrap text-center">
                                <span class="badge badge-td"><i class="fa fa-check-circle"></i> TC</span>
                                <span class="badge badge-cgt"><i class="fa fa-check-circle"></i> CGT</span>
                                <span class="badge badge-ccgt"><i class="fa fa-check-circle"></i> CCGT</span>
                            </div>
                        </li>
                        <li><div class="number-info">Number of group : <span class="value">2</span></div></li>
                        <li><div class="number-info">Number of CGT : <span class="value">6</span></div></li>
                    </ul>
                </div>
            </div>
        </div>
        
    </div>
    <div class="col-md-8">
        <div class="panel panel-default panel-section">
            <div class="panel-heading">
                <div class="panel-title"><i class="fa fa-info-circle panel-icon"></i> General Information</div>
            </div>
            <div class="panel-body">
                <table class="table table-profile table-info-list">
                    <tbody>
                        <tr>
                            <td width="30%">Nama Lengkap</td>
                            <td><?php echo $data['user']['name']; ?></td>
                        </tr>
                        <tr>
                            <td width="30%">Username</td>
                            <td><?php echo $data['user']['username']; ?></td>
                        </tr>
                        <tr>
                            <td width="30%">Email</td>
                            <td><?php echo $data['user']['email']; ?></td>
                        </tr>
                        <tr>
                            <td width="30%">No. Telp</td>
                            <td><?php echo $data['user']['phone']; ?></td>
                        </tr>
                        <tr>
                            <td width="30%">Address</td>
                            <td><?php echo $data['user']['address']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
