<!-- File: /app/views/papers/index.ctp -->

<h1>Enter Paper Marks</h1>
<?php
    echo $this->Form->create('StudentsPaper');
    echo $this->Form->input('admission_no');
    echo $this->Form->input('subject_code');
    echo $this->Form->input('part');
    echo $this->Form->input('mark');
    echo $this->Form->input('presence');
    echo $this->Form->end('Save Marks', array('controller' => 'papers','action' => 'enterMarks'));
?>


<h1>Papers Facing</h1>
<br>

<table>
    <tr>
        <th>Admission No</th>
        <th>Subject Code</th>
        <th>Part</th>
        <th>Mark</th>
        <th>Presence</th>

    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($studentsPapers as $studentsPaper): ?>
    <tr>
        <td><?php echo $studentsPaper['StudentsPaper']['admission_no']; ?></td>
        <td><?php echo $studentsPaper['StudentsPaper']['subject_code']; ?></td>
        <td><?php echo $studentsPaper['StudentsPaper']['part']; ?></td>
        <td><?php echo $studentsPaper['StudentsPaper']['mark']; ?></td>
        <td><?php echo $studentsPaper['StudentsPaper']['presence']; ?></td>
        
	<td>
        

	<?php echo $this->Html->link('Edit', array('action' => 'editMarks', $studentsPaper['StudentsPaper']['paper_id']));?>

        </td>

    </tr>
    <?php endforeach; ?>

</table>

