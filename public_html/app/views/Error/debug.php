<html>
<head>
    <title>Error #<?php echo $this->type; ?></title>
    <style type="text/css">
        body{font-family: "DejaVu Sans Mono";color:#ffffff;background-color:#0b0f0d;font-size:10pt}
        ul{list-style: none;padding-left: 0;border: solid black 1px;background-color:#212b27}
        li{margin-left: 0px;color:#5a8b9e}
        li.al{background-color: #7c0000;color: #ffffff}
		li .num{background-color:#2d3335;padding:1px;color:#eeeeec;margin:0;}
		li pre{margin:0;display: inline;}
		
    </style>
</head>
<body>
    <h1 style="color:#ff0000">Error #<?php echo $this->ex->getCode(); ?></h1>
    <p><?php echo $this->ex->getMessage(); ?></p>
    <p><b>File:</b>&nbsp;<?php echo $this->ex->getFile(); ?>&nbsp;<b>Line:</b><?php echo $this->ex->getLine(); ?></p>
    <ul><?php
        $list = file($this->ex->getFile());
        $ind = $this->ex->getLine();
        if ($this->ex->getLine()<3){
            $ind = 1;
        } else {
            $ind -= 2;
        }
        $last = $ind+4;
        if ($last>count($list)){
            $last = count($list);
        }

        for ($i = $ind-1; $i < $last; $i++) {?>
			<li <?php if($i+1 == $this->ex->getLine()){?>class="al"<?}?>>
				<span class="num"><?php echo ($i+1).':'?></span>
				<pre><?php echo htmlspecialchars($list[$i]); ?></pre>
			</li>
        <?}
    ?></ul>
    <br /><br />
    <?php    var_dump(debug_backtrace()); ?>
</body>
</html>