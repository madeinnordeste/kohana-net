kohana-net
==========

Information about network ip

# get ip

	$ip = Net::ip();
	
this return ip number, like **192.30.252.129**

# get ip data

	$ip_data = Net::ip_data(); //get data from client ip
	$ip_data = Net::ip_data('192.30.252.129'); //get data from specific ip

this return an object like:

	object(stdClass)#18 (11) { 
					["ip"]=> string(14) "192.30.252.129" 
					["country_code"]=> string(2) "US" 
					["country_name"]=> string(13) "United States" 
					["region_code"]=> string(2) "CA" 
					["region_name"]=> string(10) "California" 
					["city"]=> string(13) "San Francisco" 
					["zipcode"]=> string(5) "94107" 
					["latitude"]=> float(37.7697) 
					["longitude"]=> float(-122.3933) 
					["metro_code"]=> string(3) "807" 
					["area_code"]=> string(3) "415" 
				}

It's all!

	
