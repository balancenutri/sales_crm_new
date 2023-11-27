<table class="table bg-secondary" style="margin-bottom:0px;">
  <thead class="text-center">
    <tr>
        <th scope="col" ></th>
        <th style="background:#52BE80">Set</th>
        <th style="background:#ABB2B9">Avg./Monthly</th>
        <th style="background:#E74C3C">Avg./Day</th>
    </tr>
  </thead>
  <tbody class="text-center">
    <tr>
      <th scope="col">Lead</th>
      <td style="background:#ABEBC6" id="lead_set"><?php echo $lead_set; ?></td>
      <td style="padding-right: 0px;background:#D5D8DC" id="lead_avg_monthly"><?php echo $lead_needed_monthly; ?></td>
      <td style="padding-right: 0px;background:#F5B7B1" id="lead_avg_day"><?php echo $lead_needed; ?></td>
    </tr>
    <tr>
      <th>Consultation</th>
      <td style="background:#ABEBC6" id="consultation_set"><?php echo $consultation_set; ?></td>
      <td style="background:#D5D8DC" id="consultation_avg_monthly"><?php echo $consultation_needed_monthly; ?></td>
      <td style="background:#F5B7B1" id="consultation_avg_day"><?php echo $consultation_needed; ?></td>
    </tr>
    <tr>
      <th>Sales Unit</th>
      <td style="background:#ABEBC6" id="unit_set"><?php echo $unit_set; ?></td>
      <td style="background:#D5D8DC" id="sale_avg_monthly"><?php echo $unit_needed_monthly; ?></td>
      <td style="background:#F5B7B1" id="sale_avg_day"><?php echo $unit_needed; ?></td>
    </tr>
    <tr>
      <th>Sales Amount</th>
      <td style="background:#ABEBC6" id="amount_set"><?php echo $amount_set; ?></td>
      <td style="background:#D5D8DC" id="amount_avg_monthly"><?php echo $amount_needed_monthly; ?></td>
      <td style="background:#F5B7B1" id="amount_avg_day"><?php echo $amount_needed; ?></td>
    </tr>
  </tbody>
</table>