<?php
$msg  = '';
$link = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $f = $_FILES['file'];
    if ($f['error'] === UPLOAD_ERR_OK) {
        $name = basename($f['name']);
        $dest = __DIR__ . '/uploads/' . $name;
        if (move_uploaded_file($f['tmp_name'], $dest)) {
            $msg  = 'ok';
            $link = 'uploads/' . htmlspecialchars($name);
        } else { $msg = 'err'; }
    } else { $msg = 'err'; }
}
?>
<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<title>CorpLink · 01 File Upload</title>
<style>*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}body{background:#0a0e1a;color:#c8cdd8;font-family:'Segoe UI',system-ui,sans-serif;min-height:100vh}nav{background:#111827;border-bottom:2px solid #1f2937;height:60px;display:flex;align-items:center;padding:0 32px;gap:32px}.nav-brand{font-size:1.05rem;font-weight:700;color:#f1f5f9;white-space:nowrap}.nav-brand span{background:linear-gradient(135deg,#3b82f6,#6366f1);-webkit-background-clip:text;-webkit-text-fill-color:transparent}.nav-links{display:flex;gap:2px;flex:1}.nav-links a{color:#6b7280;text-decoration:none;padding:7px 13px;border-radius:6px;font-size:.82rem;transition:color .15s,background .15s}.nav-links a:hover,.nav-links a.active{color:#e2e8f0;background:#1f2937}main{max-width:880px;margin:0 auto;padding:44px 24px}h2{font-size:1.3rem;color:#f1f5f9;margin-bottom:6px}.sub{color:#6b7280;font-size:.86rem;margin-bottom:32px;line-height:1.5}.card{background:#111827;border:1px solid #1f2937;border-radius:12px;padding:28px;margin-bottom:20px}.card h3{font-size:.95rem;color:#f1f5f9;margin-bottom:18px}label{display:block;font-size:.8rem;color:#9ca3af;margin-bottom:8px}.input-row{display:flex;gap:12px;align-items:center}input[type=text]{flex:1;background:#0d1324;border:1px solid #1f2937;border-radius:8px;padding:12px 14px;color:#e2e8f0;font-size:.9rem;font-family:'Courier New',monospace;outline:none;transition:border-color .2s}input[type=text]:focus{border-color:#3b82f6}input[type=file]{background:#0d1324;border:1px solid #1f2937;border-radius:8px;padding:12px 14px;color:#6b7280;font-size:.88rem;width:100%;cursor:pointer}.btn{background:linear-gradient(135deg,#3b82f6,#6366f1);color:#fff;border:none;border-radius:8px;padding:12px 22px;font-size:.88rem;font-weight:600;cursor:pointer;transition:opacity .2s}.btn:hover{opacity:.88}.hint{font-size:.74rem;color:#374151;margin-top:10px;font-family:'Courier New',monospace}.output{background:#050810;border:1px solid #1f2937;border-radius:8px;padding:20px;font-family:'Courier New',monospace;font-size:.82rem;color:#22c55e;white-space:pre-wrap;word-break:break-all;min-height:60px;line-height:1.65;margin-top:18px}.output.err{color:#f87171}.src-toggle{display:flex;align-items:center;gap:10px;margin-bottom:20px}.src-btn{background:#1f2937;color:#9ca3af;border:1px solid #374151;border-radius:6px;padding:6px 14px;font-size:.78rem;cursor:pointer;transition:color .2s,border-color .2s;font-family:inherit}.src-btn:hover{color:#e2e8f0;border-color:#6b7280}.src-panel{display:none;background:#0d1a0d;border:1px solid #166534;border-radius:10px;padding:20px;margin-bottom:22px}.src-panel.open{display:block}.src-label{font-size:.7rem;color:#4ade80;text-transform:uppercase;letter-spacing:.9px;margin-bottom:12px}.src-panel pre{font-family:'Courier New',monospace;font-size:.82rem;color:#86efac;line-height:1.65;overflow-x:auto}.ch-header{display:flex;align-items:flex-start;gap:16px;margin-bottom:30px;padding-bottom:24px;border-bottom:1px solid #1f2937}.ch-num{background:linear-gradient(135deg,#3b82f6,#6366f1);color:#fff;font-size:.85rem;font-weight:700;padding:4px 10px;border-radius:6px;white-space:nowrap;align-self:flex-start;margin-top:3px}.ch-meta{flex:1}.ch-meta h2{margin-bottom:4px}.ch-meta p{color:#6b7280;font-size:.85rem;line-height:1.5}.ch-tags{display:flex;gap:6px;margin-top:10px;flex-wrap:wrap}.ch-tags span{background:#1f2937;color:#6b7280;font-size:.7rem;padding:3px 9px;border-radius:4px;font-family:'Courier New',monospace}.link-box{background:#0d1324;border:1px solid #22c55e;border-radius:8px;padding:16px 20px;margin-top:18px;display:flex;align-items:center;gap:14px}.link-box a{color:#22c55e;font-family:'Courier New',monospace;font-size:.88rem;text-decoration:none;word-break:break-all}.link-box a:hover{text-decoration:underline}.admin-panel{background:#0c1a10;border:1px solid #166534;border-radius:10px;padding:22px;margin-top:16px}.admin-panel h4{color:#22c55e;font-size:.9rem;margin-bottom:16px}.row{display:flex;gap:12px;margin-bottom:10px;font-size:.84rem}.row .k{color:#6b7280;width:160px;flex-shrink:0}.row .v{font-family:'Courier New',monospace;color:#e2e8f0;word-break:break-all}.denied{color:#6b7280;font-size:.86rem;padding:18px;border:1px dashed #1f2937;border-radius:8px;text-align:center;margin-top:12px}.grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:16px;margin-top:4px}.tile{background:#111827;border:1px solid #1f2937;border-radius:12px;padding:24px 20px;text-decoration:none;color:#c8cdd8;transition:border-color .2s,background .2s;display:block}.tile:hover{border-color:#3b82f6;background:#111f35}.tile-num{font-size:2rem;font-weight:800;background:linear-gradient(135deg,#3b82f6,#6366f1);-webkit-background-clip:text;-webkit-text-fill-color:transparent;margin-bottom:10px;line-height:1}.tile-name{font-size:1rem;font-weight:600;color:#f1f5f9;margin-bottom:8px}.tile-desc{font-size:.8rem;color:#6b7280;line-height:1.55;margin-bottom:14px}.tile-tags{display:flex;gap:6px;flex-wrap:wrap}.tile-tags span{background:#1f2937;color:#6b7280;font-size:.7rem;padding:3px 9px;border-radius:4px;font-family:'Courier New',monospace}footer{text-align:center;color:#1f2937;font-size:.72rem;padding:40px 0 20px}</style>
<script>
function toggleSrc(id){
  var p=document.getElementById(id),b=document.getElementById(id+'-btn');
  if(p.classList.contains('open')){p.classList.remove('open');b.textContent='{ } Show Source';}
  else{p.classList.add('open');b.textContent='{ } Hide Source';}
}
</script>
</head>
<body>
<nav><div class='nav-brand'><span>CorpLink</span> Lab</div><div class='nav-links'><a href='index.php'>Overview</a><a href='challenge1.php' class='active'>01 · File Upload</a><a href='challenge2.php'>02 · Command Injection</a><a href='challenge3.php'>03 · File Inclusion</a><a href='challenge4.php'>04 · Cookie Manipulation</a></div></nav>
<main>

<div class='ch-header'>
  <span class='ch-num'>Challenge 01</span>
  <div class='ch-meta'>
    <h2>Unrestricted File Upload &mdash; PHP Webshell</h2>
    <p>The NovaTech document portal allows staff to submit incident reports and internal files.
       The upload handler performs no validation on file type or extension.
       Any file — including PHP — is accepted and stored in a web-accessible directory.</p>
    <div class='ch-tags'><span>move_uploaded_file()</span><span>no extension check</span><span>RCE</span></div>
  </div>
</div>

<div class='src-toggle'>
  <button class='src-btn' id='src-c1-btn' onclick='toggleSrc("src-c1")'>{ } Show Source</button>
  <span style='font-size:.75rem;color:#374151'>Toggle vulnerable source</span>
</div>
<div class='src-panel' id='src-c1'>
  <div class='src-label'>Vulnerable source &mdash; challenge1.php</div>
  <pre>
// No MIME check, no extension whitelist, no filename sanitization
$name = basename($_FILES['file']['name']);
$dest = __DIR__ . '/uploads/' . $name;

// File lands in a web-accessible directory — Apache will execute .php files
move_uploaded_file($_FILES['file']['tmp_name'], $dest);

// Fix: validate extension against a whitelist, store outside webroot,
// rename to a random hash, and disable PHP execution in the uploads/ dir.</pre>
</div>

<div class='card'>
  <h3>&#128196; Document Upload Portal</h3>
  <p style='color:#6b7280;font-size:.85rem;margin-bottom:20px'>
    Submit incident reports and internal documents. Accepted formats: PDF, DOCX, JPG, PNG.
  </p>
  <form method='POST' action='challenge1.php' enctype='multipart/form-data'>
    <label>Select file</label>
    <input type='file' name='file'>
    <br><br>
    <button type='submit' class='btn'>&#8679; Upload</button>
  </form>
</div>

<?php if ($msg === 'ok'): ?>
<div class='link-box'>
  <span style='color:#22c55e;font-size:1.1rem'>&#10003;</span>
  <div>
    <div style='font-size:.75rem;color:#6b7280;margin-bottom:4px'>File uploaded successfully &mdash; accessible at:</div>
    <a href='<?= $link ?>' target='_blank'><?= $link ?></a>
  </div>
</div>
<?php elseif ($msg === 'err'): ?>
<div class='output err'>Upload failed. Check folder permissions.</div>
<?php endif; ?>

</main>
<footer>&copy; 2024 NovaTech Corporation &mdash; CorpLink v1.3.0</footer>
</body>
</html>
