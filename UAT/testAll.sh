# Created By Tushar Anand 
# Goal - Run all the UAT python scripts 
# Requirment - Correct site url argument for the UAT testing, selenium module setup
#
site='http://localhost/myStore/Source%20Code/user/login.php'
for f in *.py; do python "$f" "$site"; done
$SHELL