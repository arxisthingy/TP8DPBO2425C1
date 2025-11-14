<?php
// course view
$isEditMode = isset($data_to_edit);
$formAction = $isEditMode ? 'index.php?controller=course&action=update' : 'index.php?controller=course&action=store';
?>

<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title"><?php echo $isEditMode ? 'Edit Mata Kuliah' : 'Tambah Mata Kuliah Baru'; ?></h3>
    </div>
    <div class="card-body">
        <form action="<?php echo $formAction; ?>" method="POST">
            
            <?php if ($isEditMode): ?>
                <input type="hidden" name="id" value="<?php echo $data_to_edit['id']; ?>">
            <?php endif; ?>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="course_code" class="form-label">Kode Mata Kuliah</label>
                        <input type="text" class="form-control" id="course_code" name="course_code" value="<?php echo $isEditMode ? htmlspecialchars($data_to_edit['course_code']) : ''; ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="sks" class="form-label">SKS</label>
                        <input type="number" class="form-control" id="sks" name="sks" value="<?php echo $isEditMode ? htmlspecialchars($data_to_edit['sks']) : ''; ?>" required>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="course_name" class="form-label">Nama Mata Kuliah</label>
                <input type="text" class="form-control" id="course_name" name="course_name" value="<?php echo $isEditMode ? htmlspecialchars($data_to_edit['course_name']) : ''; ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="lecturer_id" class="form-label">Dosen Pengampu</label>
                <select name="lecturer_id" id="lecturer_id" class="form-select">
                    <option value="">-- Pilih Dosen --</option>
                    <?php foreach ($lecturers as $lecturer): ?>
                        <option value="<?php echo $lecturer['id']; ?>" <?php echo ($isEditMode && $lecturer['id'] == $data_to_edit['lecturer_id']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($lecturer['name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary"><?php echo $isEditMode ? 'Update' : 'Simpan'; ?></button>
            <?php if ($isEditMode): ?>
                <a href="index.php?controller=course" class="btn btn-secondary">Batal</a>
            <?php endif; ?>
        </form>
    </div>
</div>

<hr class="my-4">

<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Daftar Mata Kuliah</h3>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No.</th>
                    <th>Kode MK</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Dosen Pengampu</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                foreach ($data_list as $row): ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($row['course_code']); ?></td>
                    <td><?php echo htmlspecialchars($row['course_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['sks']); ?></td>
                    <td><?php echo htmlspecialchars($row['lecturer_name'] ?? 'N/A'); ?></td>
                    <td>
                        <a href="index.php?controller=course&edit_id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="index.php?controller=course&action=delete&id=<?php echo $row['id']; ?>" 
                           onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');" 
                           class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>