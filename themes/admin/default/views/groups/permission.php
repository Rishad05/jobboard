

<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
   //$userdata = $this->site->findeNameByID('groups','id',$usersid);
    ?>
<style>
   .table td:first-child {
   font-weight: bold;
   }
   label {
   margin-right: 10px;
   }
 
   ul {
    text-align: left;
    }
    li {
        list-style: none;
        padding: 8px 0 0 0;
        min-height: 33px;
    }
</style>
<div class="box">
   <div class="box-header style_header">
      <h2 class="blue"><i class="fa-fw fa fa-folder-open"></i><?= lang('group_permissions') ."(".$info->group_name.")"; ?></h2>
   </div>
   <div class="box-content container">
      <div class="row">
         <div class="col-lg-12">
            <?php 
               echo form_open("admin/groups/permission/".$user_groups_id); ?>
            <input type="hidden" name="user_groups_id" value="<?= $user_groups_id; ?>">
            <div class="table-responsive">
               <table class="table table-bordered table-hover table-striped">
                  <thead>
                     <tr>
                        <th colspan="6"
                           class="text-center"><?= lang("Group Permissions (".$info->group_name." )"); ?></th>
                     </tr>
                     <tr>
                        <th rowspan="2" class="text-center"><?= lang("Module_Name"); ?>
                        </th>
                     </tr>
                     <tr>
                        <th class="text-center"><?= lang("Module"); ?></th>
                        <th class="text-center"><?= lang("List"); ?></th>
                        <th class="text-center"><?= lang("add"); ?></th>
                        <th class="text-center"><?= lang("edit"); ?></th>
                        <th class="text-center"><?= lang("delete"); ?></th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td><?= lang("Company"); ?></td>
                        <td class="text-center">
                           <input type="checkbox" value="1" class="checkbox" name="company_module" <?php echo $p->company_module ? "checked" : ''; ?>>
                        </td>
                         <td class="text-center">
                        </td>
                        <td class="text-center">
                        </td>
                        <td class="text-center">
                           <input type="checkbox" value="1" class="checkbox" name="company_edit" <?php echo $p->company_edit ? "checked" : ''; ?>>
                        </td>
                        <td class="text-center">
                        </td>
                     </tr>
                     <tr>
                        <td ><?= lang("Assessment Settings"); ?></td>
                        <td class="text-center">
                           <input type="checkbox" value="1" class="checkbox" name="assessment_settings_module" <?php echo $p->assessment_settings_module ? "checked" : ''; ?>>
                        </td>
                         <td class="text-center">
                            <ul>
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="assessment_questions" <?php echo $p->assessment_questions ? "checked" : ''; ?>> Questions
                                </li>
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="assessment_critical_risks" <?php echo $p->assessment_critical_risks ? "checked" : ''; ?>> Critical Risks
                                </li>
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="assessment_consequence" <?php echo $p->assessment_consequence ? "checked" : ''; ?>> Consequence
                                </li>
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="assessment_likelihood" <?php echo $p->assessment_likelihood ? "checked" : ''; ?>> Likelihood
                                </li>

                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="assessment_rating" <?php echo $p->assessment_rating ? "checked" : ''; ?>> Rating
                                </li>
                            </ul>

                            

                        </td>
                        <td class="text-center">
                            <ul>
                                <li> 
                                    
                                </li>
                                <li> 
                                    
                                </li>
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="assessment_consequence_add" <?php echo $p->assessment_consequence_add ? "checked" : ''; ?>> Consequence
                                </li>
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="assessment_likelihood_add" <?php echo $p->assessment_likelihood_add ? "checked" : ''; ?>> Likelihood
                                </li>

                                <li> 
                                   
                                </li>
                            </ul>

                        </td>
                        <td class="text-center">
                            <ul>
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="assessment_questions_edit" <?php echo $p->assessment_questions_edit ? "checked" : ''; ?>> Questions
                                </li>
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="assessment_critical_risks_edit" <?php echo $p->assessment_critical_risks_edit ? "checked" : ''; ?>> Critical Risks
                                </li>
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="assessment_consequence_edit" <?php echo $p->assessment_consequence_edit ? "checked" : ''; ?>> Consequence
                                </li>
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="assessment_likelihood_edit" <?php echo $p->assessment_likelihood_edit ? "checked" : ''; ?>> Likelihood
                                </li>

                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="assessment_rating_edit" <?php echo $p->assessment_rating_edit ? "checked" : ''; ?>> Rating
                                </li>
                            </ul>
                        </td>
                        <td class="text-center">
                        </td>
                     </tr>
                     <tr>
                        <td ><?= lang("Observation Settings"); ?></td>
                        <td class="text-center">
                           <input type="checkbox" value="1" class="checkbox" name="observation_settings_module" <?php echo $p->observation_settings_module ? "checked" : ''; ?>>
                        </td>
                         <td class="text-center">
                             <ul>
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="observation_questions" <?php echo $p->observation_questions ? "checked" : ''; ?>> Questions
                                </li>
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="observation_critical_risks" <?php echo $p->observation_critical_risks ? "checked" : ''; ?>> Critical Risks
                                </li>
                                
                            </ul>

                        </td>
                        <td class="text-center">
                        </td>
                        <td class="text-center">
                            <ul>
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="observation_questions_edit" <?php echo $p->observation_questions_edit ? "checked" : ''; ?>> Questions
                                </li>
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="observation_critical_risks_edit" <?php echo $p->observation_critical_risks_edit ? "checked" : ''; ?>> Critical Risks
                                </li>
                                
                            </ul>
                        </td>
                        <td class="text-center">
                        </td>
                     </tr>
                     <tr>
                        <td><?= lang("Hazard Settings"); ?></td>
                        <td class="text-center">
                           <input type="checkbox" value="1" class="checkbox" name="hazard_settings_module" <?php echo $p->hazard_settings_module ? "checked" : ''; ?>>
                        </td>
                         <td class="text-center">
                            <ul>
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="hazard_questions" <?php echo $p->hazard_questions ? "checked" : ''; ?>> Questions
                                </li>
                               
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="hazard_consequence" <?php echo $p->hazard_consequence ? "checked" : ''; ?>> Consequence
                                </li>
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="hazard_likelihood" <?php echo $p->hazard_likelihood ? "checked" : ''; ?>> Likelihood
                                </li>

                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="hazard_rating" <?php echo $p->hazard_rating ? "checked" : ''; ?>> Rating
                                </li>
                            </ul>
                        </td>
                        <td class="text-center">
                            <ul>
                               
                               
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="hazard_consequence_add" <?php echo $p->hazard_consequence_add ? "checked" : ''; ?>> Consequence
                                </li>
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="hazard_likelihood_add" <?php echo $p->hazard_likelihood_add ? "checked" : ''; ?>> Likelihood
                                </li>

                               
                            </ul>
                        </td>
                        
                        <td class="text-center">
                            <ul>
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="hazard_questions_edit" <?php echo $p->hazard_questions_edit ? "checked" : ''; ?>> Questions
                                </li>
                               
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="hazard_consequence_edit" <?php echo $p->hazard_consequence_edit ? "checked" : ''; ?>> Consequence
                                </li>
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="hazard_likelihood_edit" <?php echo $p->hazard_likelihood_edit ? "checked" : ''; ?>> Likelihood
                                </li>

                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="hazard_rating_edit" <?php echo $p->hazard_rating_edit ? "checked" : ''; ?>> Rating
                                </li>
                            </ul>
                        </td>
                        <td class="text-center">
                        </td>
                     </tr>
                     <tr>
                        <td><?= lang("Incident Settings"); ?></td>
                        <td class="text-center">
                           <input type="checkbox" value="1" class="checkbox" name="incident_settings_module" <?php echo $p->incident_settings_module ? "checked" : ''; ?>>
                        </td>
                         <td class="text-center">
                             <ul>
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="incident_questions" <?php echo $p->incident_questions ? "checked" : ''; ?>> Questions
                                </li>
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="incident_actualconsequence" <?php echo $p->incident_actualconsequence ? "checked" : ''; ?>> Actual consequence
                                </li>
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="incident_consequence" <?php echo $p->incident_consequence ? "checked" : ''; ?>> Consequence
                                </li>
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="incident_likelihood" <?php echo $p->incident_likelihood ? "checked" : ''; ?>> Likelihood
                                </li>

                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="incident_rating" <?php echo $p->incident_rating ? "checked" : ''; ?>> Rating
                                </li>
                            </ul>
                        </td>
                        <td class="text-center">
                             <ul>
                                
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="incident_actualconsequence_add" <?php echo $p->incident_actualconsequence_add ? "checked" : ''; ?>> Actual consequence
                                </li>
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="incident_consequence_add" <?php echo $p->incident_consequence_add ? "checked" : ''; ?>> Consequence
                                </li>
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="incident_likelihood_add" <?php echo $p->incident_likelihood_add ? "checked" : ''; ?>> Likelihood
                                </li>

                              
                            </ul>
                        </td>
                        <td class="text-center">
                            <ul>
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="incident_questions_edit" <?php echo $p->incident_questions_edit ? "checked" : ''; ?>> Questions
                                </li>
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="incident_actualconsequence_edit" <?php echo $p->incident_actualconsequence_edit ? "checked" : ''; ?>> Actual consequence
                                </li>
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="incident_consequence_edit" <?php echo $p->incident_consequence_edit ? "checked" : ''; ?>> Consequence
                                </li>
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="incident_likelihood_edit" <?php echo $p->incident_likelihood_edit ? "checked" : ''; ?>> Likelihood
                                </li>

                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="incident_rating_edit" <?php echo $p->incident_rating_edit ? "checked" : ''; ?>> Rating
                                </li>
                            </ul>
                        </td>
                        <td class="text-center">
                        </td>
                     </tr>
                     <tr>
                        <td><?= lang("View Activity"); ?></td>
                        <td class="text-center">
                           <input type="checkbox" value="1" class="checkbox" name="view_activity_module" <?php echo $p->view_activity_module ? "checked" : ''; ?>>
                        </td>
                         <td class="text-center">
                             <ul>
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="assessment_list" <?php echo $p->assessment_list ? "checked" : ''; ?>> Assessment 
                                </li>
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="observation_list" <?php echo $p->observation_list ? "checked" : ''; ?>> Observation 
                                </li>
                                
                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="hazard_list" <?php echo $p->hazard_list ? "checked" : ''; ?>> Hazard 
                                </li>

                                <li> 
                                    <input type="checkbox" value="1" class="checkbox" name="incident_list" <?php echo $p->incident_list ? "checked" : ''; ?>> Incident 
                                </li>
                            </ul>
                        </td>
                        <td class="text-center">
                        </td>
                        <td class="text-center">
                        </td>
                        <td class="text-center">
                        </td>
                     </tr>
                     <tr>
                        <td><?= lang("Management"); ?></td>
                        <td class="text-center">
                           <input type="checkbox" value="1" class="checkbox" name="management_module" <?php echo $p->management_module ? "checked" : ''; ?>>
                        </td>
                         <td class="text-center">
                        </td>
                        <td class="text-center">
                           <input type="checkbox" value="1" class="checkbox" name="management_add" <?php echo $p->management_add ? "checked" : ''; ?>>
                        </td>
                        <td class="text-center">
                           <input type="checkbox" value="1" class="checkbox" name="management_edit" <?php echo $p->management_edit ? "checked" : ''; ?>>
                        </td>
                        <td class="text-center">
                           <input type="checkbox" value="1" class="checkbox" name="management_delete" <?php echo $p->management_delete ? "checked" : ''; ?>>
                        </td>
                     </tr>
                     <tr>
                        <td><?= lang("Employee"); ?></td>
                        <td class="text-center">
                           <input type="checkbox" value="1" class="checkbox" name="employee_module" <?php echo $p->employee_module ? "checked" : ''; ?>>
                        </td>
                         <td class="text-center">
                        </td>
                        <td class="text-center">
                           <input type="checkbox" value="1" class="checkbox" name="employee_add" <?php echo $p->employee_add ? "checked" : ''; ?>>
                        </td>
                        <td class="text-center">
                           <input type="checkbox" value="1" class="checkbox" name="employee_edit" <?php echo $p->employee_edit ? "checked" : ''; ?>>
                        </td>
                        <td class="text-center">
                           <input type="checkbox" value="1" class="checkbox" name="employee_delete" <?php echo $p->employee_delete ? "checked" : ''; ?>>
                        </td>
                     </tr>
                     <tr>
                        <td><?= lang("Employee team"); ?></td>
                        <td class="text-center">
                           <input type="checkbox" value="1" class="checkbox" name="employee_team_module" <?php echo $p->employee_team_module ? "checked" : ''; ?>>
                        </td>
                         <td class="text-center">
                        </td>
                        <td class="text-center">
                           <input type="checkbox" value="1" class="checkbox" name="employee_team_add" <?php echo $p->employee_team_add ? "checked" : ''; ?>>
                        </td>
                        <td class="text-center">
                           <input type="checkbox" value="1" class="checkbox" name="employee_team_edit" <?php echo $p->employee_team_edit ? "checked" : ''; ?>>
                        </td>
                        <td class="text-center">
                           <input type="checkbox" value="1" class="checkbox" name="employee_team_delete" <?php echo $p->employee_team_delete ? "checked" : ''; ?>>
                        </td>
                     </tr>
                     <tr>
                        <td><?= lang("Reports "); ?></td>
                        <td class="text-center">
                           <input type="checkbox" value="1" class="checkbox" name="reports_module" <?php echo $p->reports_module ? "checked" : ''; ?>>
                        </td>
                         <td class="text-center">
                        </td>
                        <td class="text-center">
                        </td>
                        <td class="text-center">
                        </td>
                        <td class="text-center">
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <div class="form-actions">
               <button type="submit" class="btn btn-primary"><?=lang('update')?></button>
            </div>
            <?php echo form_close();
               ?>
         </div>
      </div>
   </div>
</div>

