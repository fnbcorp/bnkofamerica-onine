<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Display Country State City using Google API</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<label for="cars">Search cars: <input list="cars" name="" type="text">
</label>
<datalist id="cars">
    <option>Volvo</option>
    <option>Saab</option>
    <option>Mercedes</option>
    <option>Audi</option>
</datalist>
<form action="" method="post">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h3>Country</h3>
                <select name="country" class="countries form-control" id="countryId">
                    <option value="">Select Country</option>
                </select>

            </div>
            <div class="col-sm-4">
                <h3>State</h3>
                <select name="state" class="states form-control" id="stateId">
                    <option value="">Select State</option>
                </select>
            </div>
            <div class="col-sm-4">
                <h3>City</h3>
                <select name="city" class="cities form-control" id="cityId">
                    <option value="">Select City</option>
                </select>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript">
    function ajaxCall() {
        this.send = function (data, url, method, success, type) {
            type = type || 'json';
            var successRes = function (data) {
                success(data);
            }

            var errorRes = function (e) {
                console.log(e);
            }
            jQuery.ajax({
                url: url,
                type: method,
                data: data,
                success: successRes,
                error: errorRes,
                dataType: type,
                timeout: 60000
            });

        }

    }

    function locationInfo() {
        var rootUrl = "https://geodata.solutions/api/api.php";
        //now check for set values
        var addParams = '';
        if (jQuery("#gds_appid").length > 0) {
            addParams += '&appid=' + jQuery("#gds_appid").val();
        }
        if (jQuery("#gds_hash").length > 0) {
            addParams += '&hash=' + jQuery("#gds_hash").val();
        }

        var call = new ajaxCall();

        this.confCity = function (id) {
            var url = rootUrl + '?type=confCity&countryId=' + jQuery('#countryId option:selected').attr('countryid') + '&stateId=' + jQuery('#stateId option:selected').attr('stateid') + '&cityId=' + id;
            var method = "post";
            var data = {};
            call.send(data, url, method, function (data) {
            });
        };


        this.getCities = function (id) {
            jQuery(".cities option:gt(0)").remove();
            var stateClasses = jQuery('#cityId').attr('class');

            var cC = stateClasses.split(" ");
            cC.shift();
            var addClasses = '';
            if (cC.length > 0) {
                acC = cC.join();
                addClasses = '&addClasses=' + encodeURIComponent(acC);
            }
            var url = rootUrl + '?type=getCities&countryId=' + jQuery('#countryId option:selected').attr('countryid') + '&stateId=' + id + addParams + addClasses;
            var method = "post";
            var data = {};
            jQuery('.cities').find("option:eq(0)").html("Please wait..");
            call.send(data, url, method, function (data) {
                jQuery('.cities').find("option:eq(0)").html("Select City");
                if (data.tp == 1) {
                    var listlen = Object.keys(data['result']).length;

                    if (listlen > 0) {
                        jQuery.each(data['result'], function (key, val) {

                            var option = jQuery('<option />');
                            option.attr('value', val).text(val);
                            jQuery('.cities').append(option);
                        });
                    }
                    else {
                        var usestate = jQuery('#stateId option:selected').val();
                        var option = jQuery('<option />');
                        option.attr('value', usestate).text(usestate);
                        option.attr('selected', 'selected');
                        jQuery('.cities').append(option);
                    }

                    jQuery(".cities").prop("disabled", false);
                }
                else {
                    alert(data.msg);
                }
            });
        };

        this.getStates = function (id) {
            jQuery(".states option:gt(0)").remove();
            jQuery(".cities option:gt(0)").remove();
            //get additional fields
            var stateClasses = jQuery('#stateId').attr('class');

            var cC = stateClasses.split(" ");
            cC.shift();
            var addClasses = '';
            if (cC.length > 0) {
                acC = cC.join();
                addClasses = '&addClasses=' + encodeURIComponent(acC);
            }
            var url = rootUrl + '?type=getStates&countryId=' + id + addParams + addClasses;
            var method = "post";
            var data = {};
            jQuery('.states').find("option:eq(0)").html("Please wait..");
            call.send(data, url, method, function (data) {
                jQuery('.states').find("option:eq(0)").html("Select State");
                if (data.tp == 1) {
                    jQuery.each(data['result'], function (key, val) {
                        var option = jQuery('<option />');
                        option.attr('value', val).text(val);
                        option.attr('stateid', key);
                        jQuery('.states').append(option);
                    });
                    jQuery(".states").prop("disabled", false);
                }
                else {
                    alert(data.msg);
                }
            });
        };

        this.getCountries = function () {
            //get additional fields
            var countryClasses = jQuery('#countryId').attr('class');

            var cC = countryClasses.split(" ");
            cC.shift();
            var addClasses = '';
            if (cC.length > 0) {
                acC = cC.join();
                addClasses = '&addClasses=' + encodeURIComponent(acC);
            }

            var presel = false;
            var iip = 'N';
            jQuery.each(cC, function (index, value) {
                if (value.match("^presel-")) {
                    presel = value.substring(7);

                }
                if (value.match("^presel-byi")) {
                    var iip = 'Y';
                }
            });


            var url = rootUrl + '?type=getCountries' + addParams + addClasses;
            var method = "post";
            var data = {};
            jQuery('.countries').find("option:eq(0)").html("Please wait..");
            call.send(data, url, method, function (data) {
                jQuery('.countries').find("option:eq(0)").html("Select Country");

                if (data.tp == 1) {
                    if (presel == 'byip') {
                        presel = data['presel'];
                        console.log('2 presel is set as ' + presel);
                    }


                    if (jQuery.inArray("group-continents", cC) > -1) {
                        var $select = jQuery('.countries');
                        console.log(data['result']);
                        jQuery.each(data['result'], function (i, optgroups) {
                            var $optgroup = jQuery("<optgroup>", { label: i });
                            if (optgroups.length > 0) {
                                $optgroup.appendTo($select);
                            }

                            jQuery.each(optgroups, function (groupName, options) {
                                var coption = jQuery('<option />');
                                coption.attr('value', options.name).text(options.name);
                                coption.attr('countryid', options.id);
                                if (presel) {
                                    if (presel.toUpperCase() == options.id) {
                                        coption.attr('selected', 'selected');
                                    }
                                }
                                coption.appendTo($optgroup);
                            });
                        });
                    }
                    else {
                        jQuery.each(data['result'], function (key, val) {
                            var option = jQuery('<option />');
                            option.attr('value', val).text(val);
                            option.attr('countryid', key);
                            if (presel) {
                                if (presel.toUpperCase() == key) {
                                    option.attr('selected', 'selected');
                                }
                            }
                            jQuery('.countries').append(option);
                        });
                    }
                    if (presel) {
                        jQuery('.countries').trigger('change');
                    }
                    jQuery(".countries").prop("disabled", false);
                }
                else {
                    alert(data.msg);
                }
            });
        };

    }

    jQuery(function () {
        var loc = new locationInfo();
        loc.getCountries();
        jQuery(".countries").on("change", function (ev) {
            var countryId = jQuery("option:selected", this).attr('countryid');
            if (countryId != '') {
                loc.getStates(countryId);
            }
            else {
                jQuery(".states option:gt(0)").remove();
            }
        });
        jQuery(".states").on("change", function (ev) {
            var stateId = jQuery("option:selected", this).attr('stateid');
            if (stateId != '') {
                loc.getCities(stateId);
            }
            else {
                jQuery(".cities option:gt(0)").remove();
            }
        });

        jQuery(".cities").on("change", function (ev) {
            var cityId = jQuery("option:selected", this).val();
            if (cityId != '') {
                loc.confCity(cityId);
            }
        });
    });


</script>
</body>

</html>