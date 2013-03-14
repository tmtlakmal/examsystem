<!-- File: /app/views/papers/index.ctp -->
<table>
<tr>
        <td width="120"><a href="http://localhost/cakeBlog/index.php/Students/index"><?php echo ('Register Students'); ?> </td>
        <td width="120"><a href="http://localhost/cakeBlog/index.php/Students/index"><?php echo ('Enter Marks'); ?> </td>
        <td width="120"><a href="http://localhost/cakeBlog/index.php/Exam_centers/index"><?php echo ('Examination Centers'); ?> </td>
        <td width="120"><a href="http://localhost/cakeBlog/index.php/Subjects/index"><?php echo ('Subject Details'); ?> </td>
        <td width="120"><a href="http://localhost/cakeBlog/index.php/Students/index"><?php echo ('Time Table'); ?> </td>
	
</tr>
</table>
<br>

<h1>Time table</h1>
<table>
    <tr>
        <th>Id</th> 
        <th>Subject code</th>
        <th>Part</th>
        <th>Percentage</th>
        <th>Date</th>
        <th>Time</th>
	<th>Practical</th>

    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($papers as $paper): ?>
    <tr>
        <td><?php echo $paper['Paper']['paper_id']; ?></td> 
        <td><?php echo $paper['Paper']['subject_code']; ?></td>
        <td><?php echo $paper['Paper']['part']; ?></td>
        <td><?php echo $paper['Paper']['percentage']; ?></td>
        <td><?php echo $paper['Paper']['date']; ?></td>
        <td><?php echo $paper['Paper']['time']; ?></td>
	<td><?php echo $paper['Paper']['prctcl']; ?></td>	
        <td>        
            <?php echo $this->Html->link('Delete', array('action' => 'delete', $paper['Paper']['paper_id']), null, 'Are you sure?')?>

            <?php echo $this->Html->link('Edit', array('action' => 'edit', $paper['Paper']['paper_id']));?>
        </td>

    </tr>
    <?php endforeach; ?>

</table>


