<?php include 'cabecera.php'; ?>
<section>
    <?php
    $user = $this->session->userdata('minick');
    if ($user != null) {
        $res = $this->db->select('url, fecha, sum(contador) as contador', false)->from('iframes')->group_by(array("url", "fecha"))->where(array('nick_usuarios' => $user))->get();

        //$num = $res->num_rows();
       // var_dump($res);die;
        if ($res->num_rows() > 0): ?>
            <div id="transicion"><p>Esta es la publicidad que as consumido mientras navegabas</p></div>
            <table>
            <thead>
            <th>Contador</th>
            <th>url</th>
            <th>fecha</th>
            </thead>
            <tbody><?php
            foreach ($res->result() as $row) {
                ?>
                <tr>
                <td>

                    <?php echo $row->contador ?>
                </td>
                <td>

                    <?php echo $row->url ?>
                </td>
                <td>

                    <?php echo $row->fecha ?>
                </td>

                </tr><?php
            }; ?>
            </tbody>
            </table><?php
        endif;
    } else redirect('Usuarios/index') ?>
</section>


</div>
<?php include 'footer.php'; ?>
</body>
</html>