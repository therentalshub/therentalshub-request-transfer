<div>
    <p>New booking request.</p>
    <div style="margin-top:30px">
        <table cellpadding="5" style="text-align:left;border-spacing:10px;border:1px #ccc solid">
            <tr>
                <td colspan="2" style="text-align:center;font-weight:bold">One-way transfer</td>
            </tr>
            <tr>
                <th>Transfer date/time</th>
                <td><?=htmlentities($vars->arvd, ENT_QUOTES);?> at <?=htmlentities($vars->arvt, ENT_QUOTES);?></td>
            </tr>
            <tr>
                <th>Pick-up from</th>
                <td><?=htmlentities($vars->arvfl, ENT_QUOTES);?></td>
            </tr>
            <tr>
                <th>Destination</th>
                <td><?=htmlentities($vars->arvtl, ENT_QUOTES);?></td>
            </tr>
            <tr>
                <th>Passengers</th>
                <td><?=(int) $vars->arvp;?></td>
            </tr>
            <tr>
                <th>Flight/ship info</th>
                <td><?=htmlentities($vars->arvf, ENT_QUOTES);?></td>
            </tr>
            <?php if ($vars->type == 2): ?>
            <tr>
                <td colspan="2" style="text-align:center;font-weight:bold;background-color:#edf8ff">Return transfer</td>
            </tr>
            <tr>
                <th>Transfer date/time</th>
                <td><?=htmlentities($vars->dptd, ENT_QUOTES);?> at <?=htmlentities($vars->dptt, ENT_QUOTES);?></td>
            </tr>
            <tr>
                <th>Pick-up from</th>
                <td><?=htmlentities($vars->dptfl, ENT_QUOTES);?></td>
            </tr>
            <tr>
                <th>Destination</th>
                <td><?=htmlentities($vars->dpttl, ENT_QUOTES);?></td>
            </tr>
            <tr>
                <th>Passengers</th>
                <td><?=(int) $vars->dptp;?></td>
            </tr>
            <tr>
                <th>Flight/ship info</th>
                <td><?=htmlentities($vars->arvf, ENT_QUOTES);?></td>
            </tr>
            <?php endif; ?>
            <?php if ($vars->notes != ''): ?>
            <tr>
                <td colspan="2" style="text-align:center;font-weight:bold;background-color:#edf8ff">Additional information</td>
            </tr>
            <tr>
                <th>Notes</th>
                <td><?=htmlentities($vars->notes, ENT_QUOTES);?></td>
            </tr>
            <?php endif; ?>
            <tr>
                <td colspan="2" style="text-align:center;font-weight:bold;background-color:#edf8ff">Contact details</td>
            </tr>
            <tr>
                <th>Customer</th>
                <td><?=htmlentities($vars->fname, ENT_QUOTES);?> <?=htmlentities($vars->lname, ENT_QUOTES);?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?=htmlentities($vars->email, ENT_QUOTES);?></td>
            </tr>
            <tr>
                <th>Phone</th>
                <td><?=htmlentities($vars->phone, ENT_QUOTES);?></td>
            </tr>
        </table>
    </div>
</div>