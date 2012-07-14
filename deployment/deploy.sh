echo "Removing current mnemonic directory..."
ssh david@192.168.h2.103 rm -rf /var/www/mnemonic

echo "Cloning git repository into davidgerth.com/var/www/mnemonic..."
ssh david@davidgerth.com git clone https://github.com/davidgerthcom/mnemonic.git /var/www/mnemonic

#echo "Creating config dir..."
#ssh david@davidgerth.com mkdir /var/www/mnemonic/application/configs

#echo "Creating application.ini"
#scp ../application/configs/application.ini david@davidgerth.com:/var/www/mnemonic/application/configs/application.ini
