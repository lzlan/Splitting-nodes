Splitting node project is a method that can split a v2ray subscription set into multiple independent nodes, then convert them into base64 encoding and store them in multiple txt files on any PHP supported virtual host to solve the problem of independent subscription requirements。

When you enter the correct node information on the page, or upload node content in. txt format (one per line), click the "Split" button, and it will automatically generate multiple. txt files in the same level directory of index.php, and finally obtain the node information through HTTP，When you need to update node content, first click delete, and then repeat the previous steps

example:
http://liangge.free.fr/node/index.php
http://liangge.free.fr/node/1.txt
http://liangge.free.fr/node/2.txt
.
.
.
http://liangge.free.fr/node/99.txt
