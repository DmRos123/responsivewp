<?php

/**
* Template Name: cannabis-form-template
*/



get_header(); ?>


<div class="container" style="width:60%; margin-left: 2em; margin-top: -75px; margin-bottom: -75px;">
  
  <form method="post">

  <div class="form-group">
    <label for="doi">DOI#, PMID# or PMCID#:</label>
    <input type="text" class="form-control" name="doi" placeholder="<?php echo $_POST['testdoi'] ?>" value="<?php echo $_POST['testdoi'] ?>">
  </div>

  <div class="form-group">
    <label for="study_title">Study Title:</label>
    <input type="text" class="form-control" name="study_title">
  </div>

<?php
  global $wpdb;
  $countries_result = $wpdb->get_results('SELECT `countries` .`id`, `country` FROM `countries`');

?>

  <div class="form-group">
    <label for="country_id">Country of Origin:</label>

<?php
foreach($countries_result as $k) {
      echo " <input type=\"checkbox\" class=\"form-control\" name=\"country_id[]\" value=\"$k->id\"/> $k->country \n";
}
?>

  </div>

  <div class="form-group">
    <label for="condition_id">Condition/Symptoms:</label>
      <input type="checkbox" class="form-control" name="condition_id[]" value="1"/> Acne
      <input type="checkbox" class="form-control" name="condition_id[]" value="2"/>Addiction to Cannabis
      <input type="checkbox" class="form-control" name="condition_id[]" value="3"/>Addiction to Crack or Cocaine
      <input type="checkbox" class="form-control" name="condition_id[]" value="4"/>Addiction to Heroin<br />
      <input type="checkbox" class="form-control" name="condition_id[]" value="5"/>Addiction to Methamphetamine
      <input type="checkbox" class="form-control" name="condition_id[]" value="6"/>Addiction to Nicotine
      <input type="checkbox" class="form-control" name="condition_id[]" value="7"/>Addiction to Opioid Based Pain Killers<br />
      <input type="checkbox" class="form-control" name="condition_id[]" value="8"/>Age-Related Macular Degeneration
      <input type="checkbox" class="form-control" name="condition_id[]" value="9"/>Aging
      <input type="checkbox" class="form-control" name="condition_id[]" value="10"/>Alcohol Dependence/Abuse
      <input type="checkbox" class="form-control" name="condition_id[]" value="11"/>Alcoholic Steatohepatitis<br />
      <input type="checkbox" class="form-control" name="condition_id[]" value="12"/>Alzheimer's Disease
      <input type="checkbox" class="form-control" name="condition_id[]" value="13"/>Amyotrophic Lateral Sclerosis (ALS or Lou Gehrig's Disease)
      <input type="checkbox" class="form-control" name="condition_id[]" value="14"/>Anorexia and Cachexia<br /> 
      <input type="checkbox" class="form-control" name="condition_id[]" value="15"/>Anorexia-Cachexia (Cancer -based) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="16"/>Anxiety 
      <input type="checkbox" class="form-control" name="condition_id[]" value="17"/>Arthritis 
      <input type="checkbox" class="form-control" name="condition_id[]" value="18"/>Asthma 
      <input type="checkbox" class="form-control" name="condition_id[]" value="19"/>Atherosclerosis<br /> 
      <input type="checkbox" class="form-control" name="condition_id[]" value="184"/>Atrial fibrillation 
      <input type="checkbox" class="form-control" name="condition_id[]" value="20"/>Attention Deficit Disorder (ADD) and Attention Deficit Hyperactivity Disorder (ADHD)<br /> 
      <input type="checkbox" class="form-control" name="condition_id[]" value="21"/>Autism
      <input type="checkbox" class="form-control" name="condition_id[]" value="185"/>Birth and Delivery
      <input type="checkbox" class="form-control" name="condition_id[]" value="22"/>Cancer (Bladder) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="23"/>Cancer (Bone) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="24"/>Cancer (Brain) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="25"/>Cancer (Breast)<br />  
      <input type="checkbox" class="form-control" name="condition_id[]" value="26"/>Cancer (Cervical)
      <input type="checkbox" class="form-control" name="condition_id[]" value="27"/>Cancer (Cholangiocarcinoma) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="28"/>Cancer (Colon)
      <input type="checkbox" class="form-control" name="condition_id[]" value="29"/>Cancer (Endometrial/Uterine)<br />  
      <input type="checkbox" class="form-control" name="condition_id[]" value="30"/>Cancer (Gastric)
      <input type="checkbox" class="form-control" name="condition_id[]" value="31"/>Cancer (Kaposi's Sarcoma) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="32"/>Cancer (Kidney)
      <input type="checkbox" class="form-control" name="condition_id[]" value="33"/>Cancer (Leukemia) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="34"/>Cancer (Liver)<br /> 
      <input type="checkbox" class="form-control" name="condition_id[]" value="35"/>Cancer (Lung) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="36"/>Cancer (Lymphoma) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="37"/>Cancer (Metastatic)
      <input type="checkbox" class="form-control" name="condition_id[]" value="38"/>Cancer (Oral) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="39"/>Cancer (Pancreatic)<br />  
      <input type="checkbox" class="form-control" name="condition_id[]" value="40"/>Cancer (Prostate)
      <input type="checkbox" class="form-control" name="condition_id[]" value="41"/>Cancer (Rhabdomyosarcoma) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="42"/>Cancer (Thyroid)<br /> 
      <input type="checkbox" class="form-control" name="condition_id[]" value="43"/>Cancer - Head and neck squamous cell carcinoma (HNSCC)
      <input type="checkbox" class="form-control" name="condition_id[]" value="44"/>Cancer of the Skin (Melanoma)<br />  
      <input type="checkbox" class="form-control" name="condition_id[]" value="45"/>Cancer (Multiple Myeloma) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="46"/>Cancer of certain Nerve Cells (Neuroblastoma)<br /> 
      <input type="checkbox" class="form-control" name="condition_id[]" value="47"/>Cancer of the Skin (Non-Melanoma) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="48"/>Cancer-Induced Night Sweats 
      <input type="checkbox" class="form-control" name="condition_id[]" value="192"/>Cannabinoid Hyperemesis Syndrome<br />  
      <input type="checkbox" class="form-control" name="condition_id[]" value="49"/>Cardiac Fibrosis
      <input type="checkbox" class="form-control" name="condition_id[]" value="50"/>Chagas Disease (Trypanosoma cruzi) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="51"/>Chemotherapy-Induced Nausea and Vomiting<br /> 
      <input type="checkbox" class="form-control" name="condition_id[]" value="52"/>Chemotherapy-Induced Peripheral Neuropathy (CIPN) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="53"/>Chronic Obstructive Pulmonary Disease (COPD)<br />
      <input type="checkbox" class="form-control" name="condition_id[]" value="54"/>Cisplatin-Induced Hearing Loss 
      <input type="checkbox" class="form-control" name="condition_id[]" value="55"/>Cisplatin-induced Nephrotoxicity<br /> 
      <input type="checkbox" class="form-control" name="condition_id[]" value="56"/>CNS-injury induced immunodeficiency syndrome (CIDS) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="57"/>Cognitive Function (Decreasing) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="58"/>Cough<br /> 
      <input type="checkbox" class="form-control" name="condition_id[]" value="59"/>Crohn's disease 
      <input type="checkbox" class="form-control" name="condition_id[]" value="60"/>Cystitis (Interstitial)
      <input type="checkbox" class="form-control" name="condition_id[]" value="197"/>Dental Caries 
      <input type="checkbox" class="form-control" name="condition_id[]" value="61"/>Depression 
      <input type="checkbox" class="form-control" name="condition_id[]" value="62"/>Dermatitis (Allergic, contact)<br />
      <input type="checkbox" class="form-control" name="condition_id[]" value="63"/>Dermatitis (Eczema)
      <input type="checkbox" class="form-control" name="condition_id[]" value="64"/>Diabetes Mellitus 
      <input type="checkbox" class="form-control" name="condition_id[]" value="191"/>Dogs
      <input type="checkbox" class="form-control" name="condition_id[]" value="65"/>Dravet Syndrome 
      <input type="checkbox" class="form-control" name="condition_id[]" value="66"/>Dupuytren's Contracture<br />  
      <input type="checkbox" class="form-control" name="condition_id[]" value="67"/>Emotional and Behavioral Disorders (EBD)
      <input type="checkbox" class="form-control" name="condition_id[]" value="68"/>Encephalitis 
      <input type="checkbox" class="form-control" name="condition_id[]" value="69"/>Encephalomyelitis 
      <input type="checkbox" class="form-control" name="condition_id[]" value="193"/>Endocannabinoid Deficiency<br /> 
      <input type="checkbox" class="form-control" name="condition_id[]" value="194"/>Endocannabinoid Tone - Imbalance
      <input type="checkbox" class="form-control" name="condition_id[]" value="70"/>Endometriosis 
      <input type="checkbox" class="form-control" name="condition_id[]" value="71"/>Epilepsy<br />
      <input type="checkbox" class="form-control" name="condition_id[]" value="72"/>Epstein–Barr Virus 
      <input type="checkbox" class="form-control" name="condition_id[]" value="73"/>Excitotoxicity
      <input type="checkbox" class="form-control" name="condition_id[]" value="74"/>Familial Mediterranean Fever<br />
      <input type="checkbox" class="form-control" name="condition_id[]" value="75"/>Fatty Liver Disease (non-alcoholic) aka (Steatosis)<br /> 
      <input type="checkbox" class="form-control" name="condition_id[]" value="76"/>Febrile Infection-Related Epilepsy Syndrome (FIRES) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="77"/>Fever 
      <input type="checkbox" class="form-control" name="condition_id[]" value="78"/>Fibromyalgia<br />
      <input type="checkbox" class="form-control" name="condition_id[]" value="79"/>Foot Nail Fungus (Onychomycosis) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="80"/>Fractured Bones
      <input type="checkbox" class="form-control" name="condition_id[]" value="186"/>Fragile X Syndrome<br /> 
      <input type="checkbox" class="form-control" name="condition_id[]" value="81"/>Fungal Infection (Candida albicans)
      <input type="checkbox" class="form-control" name="condition_id[]" value="82"/>Gastro-Esophageal Reflux Disease (GERD) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="83"/>Glaucoma<br /> 
      <input type="checkbox" class="form-control" name="condition_id[]" value="84"/>Graves' Disease
      <input type="checkbox" class="form-control" name="condition_id[]" value="85"/>Hair Growth - Unwanted (Hirsutism) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="86"/>Hair Loss (Baldness) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="87"/>Heart Disease<br />
      <input type="checkbox" class="form-control" name="condition_id[]" value="88"/>Helminthiasis
      <input type="checkbox" class="form-control" name="condition_id[]" value="89"/>Hepatic Ischemia/Reperfusion Injury 
      <input type="checkbox" class="form-control" name="condition_id[]" value="90"/>Hepatitis 
      <input type="checkbox" class="form-control" name="condition_id[]" value="91"/>Herpes 
      <input type="checkbox" class="form-control" name="condition_id[]" value="92"/>Hiccups (intractable)<br /> 
      <input type="checkbox" class="form-control" name="condition_id[]" value="93"/>HIV/AIDS
      <input type="checkbox" class="form-control" name="condition_id[]" value="94"/>Huntington's Disease 
      <input type="checkbox" class="form-control" name="condition_id[]" value="95"/>Hypertension 
      <input type="checkbox" class="form-control" name="condition_id[]" value="96"/>Infertility (male)<br />
      <input type="checkbox" class="form-control" name="condition_id[]" value="97"/>Inflammation-Induced Cognitive Damage
      <input type="checkbox" class="form-control" name="condition_id[]" value="98"/>Inflammatory Bowel Disease (IBD) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="99"/>Insomnia<br /> 
      <input type="checkbox" class="form-control" name="condition_id[]" value="100"/>Intervertebral Disc Degeneration (chronic lower back pain)
      <input type="checkbox" class="form-control" name="condition_id[]" value="101"/>Intimate partner violence (IPV)<br /> 
      <input type="checkbox" class="form-control" name="condition_id[]" value="102"/>Ischaemia-induced cardiac arrhythmias 
      <input type="checkbox" class="form-control" name="condition_id[]" value="103"/>Itching (Pruritis) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="104"/>Kidney Disease (Diabetic Nephropathy)<br />
      <input type="checkbox" class="form-control" name="condition_id[]" value="105"/>Kidney Disease (in General)
      <input type="checkbox" class="form-control" name="condition_id[]" value="106"/>Kidney Disease (Obesity-Related Kidney Dysfunction)<br /> 
      <input type="checkbox" class="form-control" name="condition_id[]" value="107"/>Kidney Disease (Sepsis-Associated Acute Kidney Injury)<br /> 
      <input type="checkbox" class="form-control" name="condition_id[]" value="108"/>Kidney Failure (Hemodialysis) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="109"/>Leishmaniasis 
      <input type="checkbox" class="form-control" name="condition_id[]" value="110"/>Lennox-Gastaut syndrome (LGS) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="111"/>Libido<br /> 
      <input type="checkbox" class="form-control" name="condition_id[]" value="195"/>Liver Cirrhosis 
      <input type="checkbox" class="form-control" name="condition_id[]" value="112"/>Liver Fibrosis 
      <input type="checkbox" class="form-control" name="condition_id[]" value="196"/>Lovesickness
      <input type="checkbox" class="form-control" name="condition_id[]" value="113"/>Lower Urinary Tract Symptoms (LUTS) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="114"/>Lupus 
      <input type="checkbox" class="form-control" name="condition_id[]" value="115"/>Malaria<br />
      <input type="checkbox" class="form-control" name="condition_id[]" value="116"/>Manic-Depressive Disorder/Bipolar Affective Disorder (BAD) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="117"/>Migraine 
      <input type="checkbox" class="form-control" name="condition_id[]" value="118"/>Morning Sickness<br />
      <input type="checkbox" class="form-control" name="condition_id[]" value="119"/>Motion Sickness
      <input type="checkbox" class="form-control" name="condition_id[]" value="120"/>Methicillin-Resistant Staphylococcus Aureus (MRSA) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="121"/>Multiple Sclerosis (MS)<br />
      <input type="checkbox" class="form-control" name="condition_id[]" value="122"/>Myasthenia Gravis
      <input type="checkbox" class="form-control" name="condition_id[]" value="123"/>Myocarditis 
      <input type="checkbox" class="form-control" name="condition_id[]" value="124"/>Nausea and Vomiting 
      <input type="checkbox" class="form-control" name="condition_id[]" value="125"/>Neonatal Encephalopathy 
      <input type="checkbox" class="form-control" name="condition_id[]" value="126"/>Neonatal Hypoxia<br />
      <input type="checkbox" class="form-control" name="condition_id[]" value="127"/>Neurodegeneration (in general) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="128"/>Neuromyotonia (Isaacs Syndrome) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="129"/>Night Vision (Poor) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="130"/>Obesity<br />
      <input type="checkbox" class="form-control" name="condition_id[]" value="131"/>Obsessive-Compulsive Disorder (OCD) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="132"/>Organ Transplant, Graft Rejection 
      <input type="checkbox" class="form-control" name="condition_id[]" value="133"/>Osteoporosis<br />
      <input type="checkbox" class="form-control" name="condition_id[]" value="134"/>Oxidative Stress 
      <input type="checkbox" class="form-control" name="condition_id[]" value="135"/>Oxygen-glucose deprivation/reperfusion injury (OGD/RI) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="136"/>Pain (Acute) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="137"/>Pain (Allodynia)<br />
      <input type="checkbox" class="form-control" name="condition_id[]" value="198"/>Pain (Central)
      <input type="checkbox" class="form-control" name="condition_id[]" value="138"/>Pain (Chronic Non-Malignant)
      <input type="checkbox" class="form-control" name="condition_id[]" value="189"/>Pain (Cancer Induced Bone Pain) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="139"/>Pain (Due to Advanced Cancer)<br /> 
      <input type="checkbox" class="form-control" name="condition_id[]" value="140"/>Pain (Eye)
      <input type="checkbox" class="form-control" name="condition_id[]" value="200"/>Pain (Inflammatory)
      <input type="checkbox" class="form-control" name="condition_id[]" value="141"/>Pain (Menstrual)
      <input type="checkbox" class="form-control" name="condition_id[]" value="202"/>Pain (Mental-Emotional)
      <input type="checkbox" class="form-control" name="condition_id[]" value="142"/>Pain (Neuropathies, AIDS-Related)<br /> 
      <input type="checkbox" class="form-control" name="condition_id[]" value="143"/>Pain (Neuropathies, Diabetes) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="144"/>Pain (Neuropathies, in general)
      <input type="checkbox" class="form-control" name="condition_id[]" value="145"/>Pain (nociceptive)
      <input type="checkbox" class="form-control" name="condition_id[]" value="201"/>Pain (Pathological)<br />
      <input type="checkbox" class="form-control" name="condition_id[]" value="199"/>Pain (Peripheral)
      <input type="checkbox" class="form-control" name="condition_id[]" value="187"/>Pain (Wounds)  
      <input type="checkbox" class="form-control" name="condition_id[]" value="146"/>Pancreatitis 
      <input type="checkbox" class="form-control" name="condition_id[]" value="147"/>Parkinson's Disease<br />
      <input type="checkbox" class="form-control" name="condition_id[]" value="148"/>Periodontitis 
      <input type="checkbox" class="form-control" name="condition_id[]" value="149"/>Pneumococcal meningitis
      <input type="checkbox" class="form-control" name="condition_id[]" value="150"/>Post Ebola Syndrome 
      <input type="checkbox" class="form-control" name="condition_id[]" value="151"/>Post-Surgery Wounds<br /> 
      <input type="checkbox" class="form-control" name="condition_id[]" value="152"/>Post-Traumatic Stress Disorder 
      <input type="checkbox" class="form-control" name="condition_id[]" value="153"/>Pregnancy<br /> 
      <input type="checkbox" class="form-control" name="condition_id[]" value="154"/>Prion Diseases (Transmissible Spongiform Encephalopathies) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="155"/>Psoriasis 
      <input type="checkbox" class="form-control" name="condition_id[]" value="156"/>Psychosis<br /> 
      <input type="checkbox" class="form-control" name="condition_id[]" value="157"/>Respiratory Syncytial Virus 
      <input type="checkbox" class="form-control" name="condition_id[]" value="158"/>Retinal Disease 
      <input type="checkbox" class="form-control" name="condition_id[]" value="159"/>Rheumatoid Arthritis 
      <input type="checkbox" class="form-control" name="condition_id[]" value="160"/>Schizophrenia 
      <input type="checkbox" class="form-control" name="condition_id[]" value="188"/>Schwannomatosis<br />
      <input type="checkbox" class="form-control" name="condition_id[]" value="161"/>Scleroderma
      <input type="checkbox" class="form-control" name="condition_id[]" value="162"/>Seborrhea 
      <input type="checkbox" class="form-control" name="condition_id[]" value="163"/>Sepsis 
      <input type="checkbox" class="form-control" name="condition_id[]" value="164"/>Sickle Cell Disease 
      <input type="checkbox" class="form-control" name="condition_id[]" value="165"/>Skin Diseases (in general) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="166"/>Sleep Apnea<br /> 
      <input type="checkbox" class="form-control" name="condition_id[]" value="167"/>Spasticity (Pediatric) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="168"/>Spinal Cord Injuries 
      <input type="checkbox" class="form-control" name="condition_id[]" value="169"/>Stress 
      <input type="checkbox" class="form-control" name="condition_id[]" value="170"/>Stroke 
      <input type="checkbox" class="form-control" name="condition_id[]" value="171"/>Sturge-Weber Syndrome<br /> 
      <input type="checkbox" class="form-control" name="condition_id[]" value="190"/>Synthetic Cannabinoids Overdose 
      <input type="checkbox" class="form-control" name="condition_id[]" value="172"/>Systemic Sclerosis 
      <input type="checkbox" class="form-control" name="condition_id[]" value="173"/>Tourette Syndrome<br /> 
      <input type="checkbox" class="form-control" name="condition_id[]" value="174"/>Toxic shock syndrome 
      <input type="checkbox" class="form-control" name="condition_id[]" value="175"/>Trauma (physical) 
      <input type="checkbox" class="form-control" name="condition_id[]" value="176"/>Traumatic Brain Injury<br />
      <input type="checkbox" class="form-control" name="condition_id[]" value="177"/>Trichotillomania (compulsive hair pulling)
      <input type="checkbox" class="form-control" name="condition_id[]" value="178"/>Tuberculosis 
      <input type="checkbox" class="form-control" name="condition_id[]" value="179"/>Tuberous sclerosis complex<br />
      <input type="checkbox" class="form-control" name="condition_id[]" value="180"/>Urinary incontinence
      <input type="checkbox" class="form-control" name="condition_id[]" value="181"/>Uveitis 
      <input type="checkbox" class="form-control" name="condition_id[]" value="182"/>Vascular Dementia
      <input type="checkbox" class="form-control" name="condition_id[]" value="183"/>Wilson's Disease 
  </div>



  <div class="form-group">
    <label for="type_of_study">Type of Study:</label>
     <input type="radio" class="form-control" name="type_of_study" value="Laboratory Study" /> Laboratory
    <input type="radio" class="form-control" name="type_of_study" value="Animal Study" /> Animal study
    <input type="radio" class="form-control" name="type_of_study" value="Meta Case Study" /> Meta-analysis/Case studies <br />
    <input type="radio" class="form-control" name="type_of_study" value="Human Trial" /> Human Trial
    <input type="radio" class="form-control" name="type_of_study" value="Double blind Human Trial" /> Double blind placebo-controlled human trial
  </div>

  <div class="form-group">
    <label for="key_findings">Key Findings:</label>
    <textarea class="form-control" name="key_findings" rows="4"></textarea>
  </div>

  <div class="form-group">
    <label for="chi_rating">CHI Rating:</label>
    <input type="radio" class="form-control" name="chi_rating" value="-1" />-1
    <input type="radio" class="form-control" name="chi_rating" value="-2" />-2     
    <input type="radio" class="form-control" name="chi_rating" value="-3" />-3 
    <input type="radio" class="form-control" name="chi_rating" value="-4" />-4 
    <input type="radio" class="form-control" name="chi_rating" value="-5" />-5 <br/> 
    <input type="radio" class="form-control" name="chi_rating" value="0" />0 <br/>
    <input type="radio" class="form-control" name="chi_rating" value="1" />+1 
    <input type="radio" class="form-control" name="chi_rating" value="2" />+2 
    <input type="radio" class="form-control" name="chi_rating" value="3" />+3 
    <input type="radio" class="form-control" name="chi_rating" value="4" />+4 
    <input type="radio" class="form-control" name="chi_rating" value="5" />+5<br/> 
    <label class="nonapp">If no CHI rating is applicable:</label>
    <input type="radio" class="form-control" name="chi_rating" value="Not applicable" />N/A 
  </div>


  <div class="form-group mbi">
    <label for="mbi_rating">MBI Rating:</label>
    <input type="radio" class="form-control" name="mbi_rating" value="-1" />-1
    <input type="radio" class="form-control" name="mbi_rating" value="-2" />-2     
    <input type="radio" class="form-control" name="mbi_rating" value="-3" />-3 
    <input type="radio" class="form-control" name="mbi_rating" value="-4" />-4 
    <input type="radio" class="form-control" name="mbi_rating" value="-5" />-5 <br/> 
    <input type="radio" class="form-control" name="mbi_rating" value="0" />0 <br/>
    <input type="radio" class="form-control" name="mbi_rating" value="1" />+1 
    <input type="radio" class="form-control" name="mbi_rating" value="2" />+2 
    <input type="radio" class="form-control" name="mbi_rating" value="3" />+3 
    <input type="radio" class="form-control" name="mbi_rating" value="4" />+4 
    <input type="radio" class="form-control" name="mbi_rating" value="5" />+5<br/>
    <label class="nonapp">If no MBI rating is applicable:</label>
    <input type="radio" class="form-control" name="mbi_rating" value="Not applicable" />N/A 
  </div>

  <div class="form-group mbi">
    <label for="mbi_notes">MBI Comments:</label>
    <textarea class="form-control" name="mbi_notes" rows="4"></textarea>
  </div>

    <div class="form-group">
    <label for="cannabinoid_id">Cannabinoids:</label>
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="25"/> Cannabinoids (unspecified/other)<br />
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="1"/> CBC
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="2"/> CBD
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="3"/> CBG
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="4"/> THC
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="5"/> CBN <br/>
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="6"/> CBC-Acid
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="7"/> CBD-Acid
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="8"/> CBG-Acid
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="9"/> THC-Acid<br />
    <label class="sublabl">Synthetic Cannabinoids:</label>
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="26"/> Synthetic Cannabinoids (unspecified/other)<br />
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="29"/> AB-x
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="10"/> Abn-CBD
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="13"/> AM-x
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="11"/> CP-x
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="15"/> HU-x
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="14"/> JWH-x <br/>
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="17"/> SR-x
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="18"/> WIN-x
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="12"/> 5F-x<br />
    <label class="sublabl">Pharmaceutical Cannabinoids:</label>
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="30"/> Nabilone (Cesamet)
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="31"/> Dronabinol (Marinol, Syndros)
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="32"/> Nabiximols (Sativex)
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="33"/> Epidiolex (Cannabidiol)<br />
    <label class="sublabl">Endocannabinoids:</label>
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="27"/> Endocannabinoids (unspecified)<br />
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="19"/> Anandamide
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="20"/> Fatty Acid Amide Hydrolase - FAAH<br/>
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="21"/> 2-arachidonoyl glycerol - 2-AG
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="22"/> Monoacylglycerol Lipase - MAGL<br/>
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="23"/> N-Arachidonoyl Dopamine - NADA<br/>
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="24"/> Virodhamine - OAE or O-AEA<br/>
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="34"/> Other Related Compounds<br />
    <label class="sublabl">Compounds that bind with ECS:</label>
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="28"/> Echinacea<br/>
    <label class="nonapp">If no type of cannabinoids are applicable:</label>
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="99"/> N/A
  </div>

      <div class="form-group">
    <label for="terpene_id">Terpenes:</label>
      <input type="checkbox" class="form-control" name="terpene_id[]" value="1"/> ß-Caryophyllene
      <input type="checkbox" class="form-control" name="terpene_id[]" value="2"/> Borneol
      <input type="checkbox" class="form-control" name="terpene_id[]" value="3"/> Camphene
      <input type="checkbox" class="form-control" name="terpene_id[]" value="4"/> Eucalyptol<br/>
      <input type="checkbox" class="form-control" name="terpene_id[]" value="5"/> Geraniol
      <input type="checkbox" class="form-control" name="terpene_id[]" value="6"/> Humulene
      <input type="checkbox" class="form-control" name="terpene_id[]" value="7"/> Limonene
      <input type="checkbox" class="form-control" name="terpene_id[]" value="8"/> Linalool<br/>
      <input type="checkbox" class="form-control" name="terpene_id[]" value="9"/> Myrcene
      <input type="checkbox" class="form-control" name="terpene_id[]" value="10"/> Nerolidol
      <input type="checkbox" class="form-control" name="terpene_id[]" value="11"/> Ocimene
      <input type="checkbox" class="form-control" name="terpene_id[]" value="12"/> Phytol<br/>
      <input type="checkbox" class="form-control" name="terpene_id[]" value="13"/> Pinene
      <input type="checkbox" class="form-control" name="terpene_id[]" value="14"/> Terpineol
      <input type="checkbox" class="form-control" name="terpene_id[]" value="15"/> Terpinolene<br />
      <label class="nonapp">If no type of terpenes are applicable:</label>
      <input type="checkbox" class="form-control" name="terpene_id[]" value="99"/> N/A
  </div>
  <div class="form-group">
    <label for="receptor_id">Receptors:</label>
    <label class="sublabl">G-protein coupled receptors - GPCR:</label>
    <input type="checkbox" class="form-control" name="receptor_id[]" value="20"/> GPCR (unspecified)<br/>
    <input type="checkbox" class="form-control" name="receptor_id[]" value="1"/> CB1
    <input type="checkbox" class="form-control" name="receptor_id[]" value="2"/> CB2<br/>
    <input type="checkbox" class="form-control" name="receptor_id[]" value="3"/> GPCR 3
    <input type="checkbox" class="form-control" name="receptor_id[]" value="4"/> GPCR 6
    <input type="checkbox" class="form-control" name="receptor_id[]" value="5"/> GPCR 18 
    <input type="checkbox" class="form-control" name="receptor_id[]" value="6"/> GPCR 55<br/>
    <input type="checkbox" class="form-control" name="receptor_id[]" value="7"/> Opioid Receptor Mu
    <input type="checkbox" class="form-control" name="receptor_id[]" value="8"/> Opioid Receptor Delta
    <input type="checkbox" class="form-control" name="receptor_id[]" value="9"/> Opioid Receptor Kappa<br/>
    <input type="checkbox" class="form-control" name="receptor_id[]" value="10"/> Opioid Receptor Nociceptin
    <input type="checkbox" class="form-control" name="receptor_id[]" value="11"/> Opioid Receptor Zeta<br/>
    <label class="sublabl">Ionotropic cannabinoid receptors - TRPs:</label>
    <input type="checkbox" class="form-control" name="receptor_id[]" value="21"/> TRPs (unspecified)<br/>
    <input type="checkbox" class="form-control" name="receptor_id[]" value="12"/> TRPA1
    <input type="checkbox" class="form-control" name="receptor_id[]" value="13"/> TRPV1
    <input type="checkbox" class="form-control" name="receptor_id[]" value="14"/> TRPV2
    <input type="checkbox" class="form-control" name="receptor_id[]" value="15"/> TRPV4
    <input type="checkbox" class="form-control" name="receptor_id[]" value="16"/> TRPM8<br/>
    <label class="sublabl">Peroxisom proliferator-activated receptors - PPARs:</label>
    <input type="checkbox" class="form-control" name="receptor_id[]" value="22"/> PPAR (unspecified)<br/>
    <input type="checkbox" class="form-control" name="receptor_id[]" value="17"/> PPAR - Alpha
    <input type="checkbox" class="form-control" name="receptor_id[]" value="18"/> PPAR - Beta/Delta
    <input type="checkbox" class="form-control" name="receptor_id[]" value="19"/> PPAR - Gamma<br/>
    <label class="nonapp">If no type of receptors are applicable:</label>
    <input type="checkbox" class="form-control" name="receptor_id[]" value="99"/> N/A
  </div>

      <div class="form-group">
    <label for="neurotransmitter_id">Neurotransmitters:</label>
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="1"/> Acetylcholine
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="3"/> Anti-inflammatory cytokines
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="4"/> Cortisol<br/>
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="5"/> Dopamine
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="6"/> Endogenous opioids
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="7"/> Epinephrine
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="8"/> Estrogen<br/>
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="9"/> GABA
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="10"/> Ghrelin
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="11"/> Glucagon
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="12"/> Glutamate<br/>
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="13"/> Insulin
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="14"/> Leptin
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="15"/> Norepinephrine
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="16"/> Oxytocin
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="17"/> Serotonin<br/>
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="18"/> Testosterone
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="19"/> Pro-inflammatory cytokines
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="20"/> Vasopressin<br />
      <label class="nonapp">If no type of neurotransmitters are applicable:</label>
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="99"/> N/A
  </div>

  <div class="form-group">
    <label for="chemotype_id">Chemotype:</label>
    <input type="checkbox" class="form-control get_value" name="chemotype_id[]" value="1" />Chemotype I<br />
    <input type="checkbox" class="form-control get_value" name="chemotype_id[]" value="2" />Chemotype II<br />
    <input type="checkbox" class="form-control get_value" name="chemotype_id[]" value="3" />Chemotype III<br />
    <label class="nonapp">If no chemotypes are applicable:</label>
    <input type="checkbox" class="form-control get_value" name="chemotype_id[]" value="4" />N/A<br />
  </div>

  <div class="form-group">
    <label for="sub_ratios">Sub-Ratios:</label>
    <textarea class="form-control" name="sub_ratios" rows="4"></textarea>
  </div>


  <div class="form-group">
    <label for="form_admin_id">Forms of Administration:</label>
    <input type="checkbox" class="form-control get_value" name="form_admin_id[]" value="1" />Inhalation
    <input type="checkbox" class="form-control get_value" name="form_admin_id[]" value="2" />Ingestion
    <input type="checkbox" class="form-control get_value" name="form_admin_id[]" value="3" />Sublingual<br />
    <input type="checkbox" class="form-control get_value" name="form_admin_id[]" value="4" />Nasal
    <input type="checkbox" class="form-control get_value" name="form_admin_id[]" value="5" />Conjunctival
    <input type="checkbox" class="form-control get_value" name="form_admin_id[]" value="6" />Topical<br />
    <input type="checkbox" class="form-control get_value" name="form_admin_id[]" value="7" />Injection
    <input type="checkbox" class="form-control get_value" name="form_admin_id[]" value="8" />Vaginal
    <input type="checkbox" class="form-control get_value" name="form_admin_id[]" value="9" />Rectal<br />
    <label class="nonapp">If no forms are applicable:</label>
    <input type="checkbox" class="form-control get_value" name="form_admin_id[]" value="10" />N/A<br />
  </div>

  <div class="form-group">
    <label for="dosage">Dosage:</label>
    <textarea class="form-control" name="dosage" rows="4"></textarea>
  </div>

      <div class="form-group">
    <label for="year_of_pub">Year of Publication:</label>
    <input type="number" class="form-control" name="year_of_pub" value="2018">
  </div>

      <div class="form-group">
    <label for="link_to_study">Link to Study:</label>
    <input type="url" class="form-control" name="link_to_study">
  </div>

        <div class="form-group">
    <label for="log_entry">Date of Entry:</label>
    <input type="date" class="form-control" name="log_entry">
  </div>

  <button type="submit" id="submit" name="BtnSubmit" class="btn btn-default">Submit</button>

</div>



<?php get_footer();
