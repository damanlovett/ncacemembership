<h1>Upload File</h1>
<div class="content">
    <?= $this->Flash->render() ?>
    <div class="upload-frm">
        <?php echo $this->Form->create($uploadData, ['type' => 'file']); ?>
            <?php echo $this->Form->input('file', ['type' => 'file', 'class' => 'form-control']); ?>
            <?php echo $this->Form->button(__('Upload File'), ['type'=>'submit', 'class' => 'form-controlbtn btn-default']); ?>
        <?php echo $this->Form->end(); ?>
    </div>
<hr />
  <!-- Table -->
    <table class="table">
        <tr>
            <th width="5%">#</th>
            <th width="20%">File</th>
            <th width="12%">Upload Date</th>
            <th width="12%">Upload Date</th>
        </tr>
        <?php if($filesRowNum > 0):$count = 0; foreach($files as $file): $count++;?>
        <tr>
            <td><?php echo $count; ?></td>
            <td><?php echo $this->Html->link($file->path.$file->name,'/'.$file->path.$file->name); ?></td>
            <td><?php echo $file->created; ?></td>
        </tr>
        <?php endforeach; else:?>
        <tr><td colspan="3">No file(s) found......</td>
        <?php endif; ?>
    </table>
</div>
