sudo yum -y install epel-release nginx screen php-fpm php-common php-cli mariadb mariadb-server 
sudo yum -y groupinstall "Development Tools"
sudo yum -y install perl perl-devel perl-ExtUtils-Embed libxslt libxslt-devel libxml2 libxml2-devel gd gd-devel GeoIP GeoIP-devel
wget https://hg.nginx.org/pkg-oss/raw-file/default/build_module.sh
chmod a+x build_module.sh
./build_module.sh -v 1.18.0 https://github.com/sergey-dryabzhinsky/nginx-rtmp-module.git
ln -s /usr/lib64/nginx/modules /etc/nginx/modules
useradd -r -d /var/cache/nginx/ -s /sbin/nologin -U nginx
mkdir -p /var/cache/nginx/
chown -R nginx:nginx /var/cache/nginx/

echo "" | /etc/nginx/nginx.conf

mkdir -p /usr/share/nginx/html/hls
chown -R nginx:nginx /mnt/hls
systemctl restart nginx
nginx -t

sudo systemctl enable php-fpm.service
sudo systemctl start php-fpm.service
sudo systemctl status php-fpm.service
cat /etc/nginx/conf.d/php-fpm.conf
ls -l /run/php-fpm/www.sock
cat /etc/nginx/default.d/php.conf
sudo systemctl restart nginx.service
sudo yum -y install --nogpgcheck https://dl.fedoraproject.org/pub/epel/epel-release-latest-8.noarch.rpm
sudo yum -y install --nogpgcheck https://download1.rpmfusion.org/free/el/rpmfusion-free-release-8.noarch.rpm 
sudo rpm -ivh https://download1.rpmfusion.org/nonfree/el/rpmfusion-nonfree-release-8.noarch.rpm
sudo dnf config-manager --enable PowerTools
sudo yum -y install ffmpeg ffmpeg-devel

echo "