	// I have this loaded with a click event in the body. Please drop this into the folder of your choice.
  
  $scope.create_zip = function() {
			var myfolderloc = '/somestring-if-you-want-it/' + $scope.some-variable-if-you-want;
		    $.ajax({
                type: 'POST',
                url: 'create_zip_archive.php',
                data: { folderloc: myfolderloc }
            });
            $scope.downloadZip = true;
	};
