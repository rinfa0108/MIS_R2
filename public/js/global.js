/**
 * 
 */

$(function(){
	
	
	$('#inputNewPersonalDataSubmit').click(function(e){
		var x;
		var r=confirm("CONTINUE SAVING??... ");
		if (r==true) {
		  //x="You pressed OK!";
			$('#frmNewPersonalDataSubmit').submit();
		} else {
		  //x="You pressed Cancel!";
			e.preventDefault();
			return false;
		}
	});
	
	$('.control-group .controls #txtAppFullname').blur(function(e){
		var val = $(this).val();
		if(val.length > 1) {	
			
			$.getJSON('/Dailystatus/getappdatabyfullname/fname/'+val, function(data){
				
					$('#inputAppDataId').val(data.APPLICANTS_PERSONAL_DATA_ID);
					$('#inputRefno').val(data.APPLICANTS_DAILYSTATUS_CODE);
					$('#inputContactno').val(data.APPLICANTS_DAILYSTATUS_CONTACTNUMBER);
					$('#inputReligion').val(data.APPLICANTS_PERSONAL_DATA_RELIGION); //inputAgentbranch
					$('#inputAgentbranch').val(data.AGENTBRANCH_ID);
					
					$('#hiddenMedicalResult').val(data.APPLICANTS_DAILYSTATUS_MEDICALRESULT);
					
					
					
					
					$('#inputDesiredPosition').val(data.APPLICANTS_PERSONAL_DATA_DESIRED_POSITION);
					$('#inputDateofbirth').val(data.APPLICANTS_PERSONAL_DATA_DATEOFBIRTH);
					$('#inputPlaceofbirth').val(data.APPLICANTS_PERSONAL_DATA_PLACEOFBIRTH);
					$('#inputCivilstat').val(data.CIVILSTATUS);
					$('#inputNoofchildren').val(data.APPLICANTS_FAMILY_DATA_NOOFCHILDREN);
					
					//passport
					$('#inputPassportNo').val(data.APPLICANTS_DAILYSTATUS_PASSPORT);
					$('#inputPassportDateissue').val(data.APPLICANTS_DAILYSTATUS_PASSPORTDATEISSUE);
					$('#inputPassportDateexpire').val(data.APPLICANTS_DAILYSTATUS_PASSPORTDATEEXPIRE);
					$('#inputPassportplaceissue').val(data.APPLICANTS_DAILYSTATUS_PASSPORTPLACEISSUE);	
					
					$('#dateappin').val(data.APPLICANTS_DAILYSTATUS_APPIN);
					$('#datemedical').val(data.APPLICANTS_DAILYSTATUS_MEDICALDATE);
					$('#labelMedicalresult').html(data.MEDICALRESULT_DESC);
					
					$('#datenbi').val(data.APPLICANTS_DAILYSTATUS_NBI);
					$('#datenbirr').val(data.APPLICANTS_DAILYSTATUS_NBIRR);
					$('#checkTraining').val(data.APPLICANTS_DAILYSTATUS_TRAINING);
					if(data.APPLICANTS_DAILYSTATUS_TRAINING == "Yes") {
						$('#uniform-checkTraining span').addClass("checked");
					}
					$('#datepdos').val(data.APPLICANTS_DAILYSTATUS_PDOS);
					$('#datetesda').val(data.APPLICANTS_DAILYSTATUS_TESDA);
					$('#dateowwa').val(data.APPLICANTS_DAILYSTATUS_OWWA);
					$('#inputpoea').val(data.APPLICANTS_DAILYSTATUS_POEA);
					
					//visa
					$('#datevisaissue').val(data.APPLICANTS_DAILYSTATUS_VISA_DATEISSUE);
					$('#datevisaexpiry').val(data.APPLICANTS_DAILYSTATUS_VISA_DATEEXPIRE);
					
					$('#datestampingfiled').val(data.APPLICANTS_DAILYSTATUS_STAMPING_FILE);
					$('#datestampingrelease').val(data.APPLICANTS_DAILYSTATUS_STAMPING_RELEASE);
					
					$('#datecontractin').val(data.APPLICANTS_DAILYSTATUS_CONTRACTIN);
					$('#dateprocess').val(data.APPLICANTS_DAILYSTATUS_PROCESSDATE);
					$('#inputSerum').val(data.APPLICANTS_DAILYSTATUS_SERUM);
					
					$('#datebooking').val(data.APPLICANTS_DAILYSTATUS_BOOKDATE);
					
					$('#inputEducAtt').val(data.APPLICANTS_DAILYSTATUS_EDUCATTAINMENT);
					$('#inputContract').val(data.APPLICANTS_DAILYSTATUS_CONTRACTLENGTH);
					$('#inputSalary').val(data.APPLICANTS_DAILYSTATUS_SALARY);
					
					$('#datedeployed').val(data.APPLICANTS_DAILYSTATUS_DEPLOYEDDATE);
					$('#inputSpeakenglish').val(data.APPLICANTS_DAILYSTATUS_SPEAKENGLISH);
					$('#inputDailystatremarks').val(data.APPLICANTS_DAILYSTATUS_REMARKS);	
					
					$('#dateendcontract').val(data.APPLICANTS_DAILYSTATUS_ENDCONTRACT_DATE);	
					
					$('#lastupdatestatus').val(data.APPLICANTS_DAILYSTATUS_DATEUPDATED);	
					
					if(data.APPLICANTS_PERSONAL_DATA_EXABROAD == 1) {
						$('#dateowwa').attr('readonly','readonly');
						$('#datetesda').attr('readonly','readonly');
						$('#div_inputpoea').show();
					} else {
						$('#div_inputpoea').hide();
					}
					
				});
			
		} else {
			$(this).parent().parent().addClass('error');
		}
	});
	
});




/**
 * Daily status on-table edit via modal box
 */
$(function(){
	$("#dailystatus table.datatable td.setValue").click(function(b){
		b.preventDefault();
		
		var name = $(this).siblings('#APPLICANTS_PERSONAL_DATA_NAME').html();
		$('#myModalDailystat .applicantsName').html(name);
		
		var ident = $(this).attr('id');
		$('#myModalDailystat .columnName').html(ident);
		//console.log(ident);
		
		var objParent = $(this).parent();
		var appid = $(objParent).attr('id');
		//console.log(appid);
		
		$.get('/Dailystatus/setdailystatvaluemodalatvaluemodal?ident='+ident+'&name='+name+'&appid='+appid, function(data){
			$('#myModalDailystat').html(data);
			$("#myModalDailystat").modal("show")
		});
		//$("#myModalDailystat").modal("show")
	});
	
	//link to summary
	$('#dailystatus table #APPLICANTS_PERSONAL_DATA_NAME').live('click',function(){
		var parentId = $(this).parent().attr('id');
		//alert(parentId );
		window.open('Applicantdata/viewbiodatasummary/id/'+parentId,'_newtab');
	});
	
	//newAppDailystatusModal
	$('#newAppDailystatusModal').live('click',function(){
		$('form#newAppDailystatus').submit();
	});
	
	
});


//** accounting */ 
$(function(){
	$('#ACCOUNTINGEXPENSES_BRANCH_SEA , #ACCOUNTINGEXPENSES_BRANCH_LAND, #ACCOUNTINGEXPENSES_BRANCH_AIRLINE, #ACCOUNTINGEXPENSES_BRANCH_PASSPORTEXP').blur(function(){
		var seaExp = parseInt($('#ACCOUNTINGEXPENSES_BRANCH_SEA').val());
		var landExp = parseInt($('#ACCOUNTINGEXPENSES_BRANCH_LAND').val());
		var airExp = parseInt($('#ACCOUNTINGEXPENSES_BRANCH_AIRLINE').val());
		var passportExp = parseInt($('#ACCOUNTINGEXPENSES_BRANCH_PASSPORTEXP').val());
		var totalBranchExp = seaExp + landExp + airExp + passportExp;
		$('#ACCOUNTINGEXPENSES_BRANCH_TOTALEXP').val(totalBranchExp);
	});
	
	
	$('#ACCOUNTINGEXPENSES_COMMISSION_AMOUNTEXP, #ACCOUNTINGEXPENSES_COMMISSION_OTHERSEXP').blur(function(){
		var commExp = parseInt($('#ACCOUNTINGEXPENSES_COMMISSION_AMOUNTEXP').val());
		var othersExp = parseInt($('#ACCOUNTINGEXPENSES_COMMISSION_OTHERSEXP').val());
		var totalCommExp = commExp + othersExp;
		$('#ACCOUNTINGEXPENSES_COMMISSION_TOTALEXP').val(totalCommExp);
	});
	
	$('#ACCOUNTINGEXPENSES_HEADOFFICE_MEDICALEXP , #ACCOUNTINGEXPENSES_HEADOFFICE_TESDAEXP, #ACCOUNTINGEXPENSES_HEADOFFICE_TRAININGEXP, #ACCOUNTINGEXPENSES_HEADOFFICE_VISAEXP, #ACCOUNTINGEXPENSES_HEADOFFICE_TICKETEXP, #ACCOUNTINGEXPENSES_HEADOFFICE_OTHERSEXP').blur(function(){
		var medicalExp = parseInt($('#ACCOUNTINGEXPENSES_HEADOFFICE_MEDICALEXP').val());
		var tesdaExp = parseInt($('#ACCOUNTINGEXPENSES_HEADOFFICE_TESDAEXP').val());
		var trainingExp = parseInt($('#ACCOUNTINGEXPENSES_HEADOFFICE_TRAININGEXP').val());
		var visaExp = parseInt($('#ACCOUNTINGEXPENSES_HEADOFFICE_VISAEXP').val());
		var ticketExp = parseInt($('#ACCOUNTINGEXPENSES_HEADOFFICE_TICKETEXP').val());
		var othersExp = parseInt($('#ACCOUNTINGEXPENSES_HEADOFFICE_OTHERSEXP').val());	
		var totalBranchExp = medicalExp + tesdaExp + trainingExp + visaExp + ticketExp + othersExp;
		$('#ACCOUNTINGEXPENSES_HEADOFFICE_TOTALEXP').val(totalBranchExp);
	});
	
	//Utilities expenses  //inputAccntUtilitiesSubmit
	$('#DIV_ACCOUNTINGEXPENSES_UTILITIES_BRANCHNO').hide();
	$('#inputAccntUtilitiesSubmit').hide();
	
	$('#ACCOUNTINGEXPENSES_UTILITIES_ISBRANCH').click(function(){
		if($('#ACCOUNTINGEXPENSES_UTILITIES_ISBRANCH').prop('checked')){
			$('#DIV_ACCOUNTINGEXPENSES_UTILITIES_BRANCHNO').show();
			$('#ACCOUNTINGEXPENSES_UTILITIES_ISBRANCH').attr('value','1');
			
			$('#uniform-ACCOUNTINGEXPENSES_UTILITIES_ISHEADOFFICE span').removeClass('checked');
			$('#ACCOUNTINGEXPENSES_UTILITIES_ISHEADOFFICE').attr('value','0');
			$('#inputAccntUtilitiesSubmit').show();
		} else {
			$('#DIV_ACCOUNTINGEXPENSES_UTILITIES_BRANCHNO').hide();
			$('#ACCOUNTINGEXPENSES_UTILITIES_ISBRANCH').attr('value','0');
		}
	});
	
	$('#ACCOUNTINGEXPENSES_UTILITIES_ISHEADOFFICE').click(function(){
		if($('#ACCOUNTINGEXPENSES_UTILITIES_ISHEADOFFICE').prop('checked')){
			$('#ACCOUNTINGEXPENSES_UTILITIES_ISHEADOFFICE').attr('value','1');
			
			$('#uniform-ACCOUNTINGEXPENSES_UTILITIES_ISBRANCH span').removeClass('checked');
			$('#ACCOUNTINGEXPENSES_UTILITIES_ISBRANCH').attr('value','0');
			$('#DIV_ACCOUNTINGEXPENSES_UTILITIES_BRANCHNO').hide();
			$('#inputAccntUtilitiesSubmit').show();
		} else {
			$('#ACCOUNTINGEXPENSES_UTILITIES_ISHEADOFFICE').attr('value','0');
		}
	});
	
});



