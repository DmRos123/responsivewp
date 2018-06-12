<?php

/**
* Template Name: cannabis-form-template
*/


print_r($_POST);


get_header(); ?>


<div class="container" style="width:50%; margin-left: 205px; margin-top: -75px; margin-bottom: -75px;">
  
  <form method="post">

  <div class="form-group">
    <label for="study_title">Study Title:</label>
    <input type="text" class="form-control" name="study_title">
  </div>

  <div class="form-group">
    <label for="country_id">Country of Origin:</label>
    <select name="country_id" class="form-control" multiple="multiple">
      <option value="1">Afghanistan</option>
      <option value="38">Canada</option>
      <option value="106">Hungary</option>
      <option value="114">Israel</option>
      <option value="238">United Kingdom</option>
      <option value="239">United States</option>
    </select>
  </div>

  <div class="form-group">
    <label for="condition_id">Condition/Symptoms:</label>
     <select name="condition_id" class="form-control" multiple="multiple">
      <option value="1">Acne</option>
      <option value="2">Addiction to Cannabis</option>
      <option value="3">Addiction to Crack or Cocaine</option>
      <option value="4">Addiction to Heroin</option>
      <option value="5">Addiction to Methamphetamine</option>
      <option value="6">Addiction to Nicotine</option>
      <option value="7">Addiction to Opioid Based Pain Killers</option>
      <option value="8">Age-Related Macular Degeneration</option>
      <option value="9">Aging</option>
      <option value="10">Alcohol Dependence/Abuse</option>
      <option value="11">Alcoholic Steatohepatitis</option>
      <option value="12">Alzheimer's Disease</option>
      <option value="13">Amyotrophic Lateral Sclerosis (ALS or Lou Gehrig's Disease)</option>
      <option value="14">Anorexia and Cachexia</option>
      <option value="15">Anorexia-Cachexia (Cancer -based)</option>
      <option value="16">Anxiety</option>
      <option value="17">Arthritis</option>
      <option value="18">Asthma</option>
      <option value="19">Atherosclerosis</option>
      <option value="20">Attention Deficit Disorder (ADD) and Attention Deficit Hyperactivity Disorder (ADHD)</option>
      <option value="21">Autism</option>
      <option value="22">Cancer (Bladder)</option>
      <option value="23">Cancer (Bone)</option>
      <option value="24">Cancer (Brain)</option>
      <option value="25">Cancer (Breast)</option>
      <option value="26">Cancer (Cervical)</option>
      <option value="27">Cancer (Cholangiocarcinoma)</option>
      <option value="28">Cancer (Colon)</option>
      <option value="29">Cancer (Endometrial/Uterine)</option>
      <option value="30">Cancer (Gastric)</option>
      <option value="31">Cancer (Kaposi's Sarcoma)</option>
      <option value="32">Cancer (Kidney)</option>
      <option value="33">Cancer (Leukemia)</option>
      <option value="34">Cancer (Liver)</option>
      <option value="35">Cancer (Lung)</option>
      <option value="36">Cancer (Lymphoma)</option>
      <option value="37">Cancer (Metastatic)</option>
      <option value="38">Cancer (Oral)</option>
      <option value="39">Cancer (Pancreatic)</option>
      <option value="40">Cancer (Prostate)</option>
      <option value="41">Cancer (Rhabdomyosarcoma)</option>
      <option value="42">Cancer (Thyroid)</option>
      <option value="43">Cancer - Head and neck squamous cell carcinoma (HNSCC)</option>
      <option value="44">Cancer of the Skin (Melanoma)</option>
      <option value="45">Cancer (Multiple Myeloma)</option>
      <option value="46">Cancer of certain Nerve Cells (Neuroblastoma)</option>
      <option value="47">Cancer of the Skin (Non-Melanoma)</option>
      <option value="48">Cancer-Induced Night Sweats</option>
      <option value="49">Cardiac Fibrosis</option>
      <option value="50">Chagas Disease (Trypanosoma cruzi)</option>
      <option value="51">Chemotherapy-Induced Nausea and Vomiting</option>
      <option value="52">Chemotherapy-Induced Peripheral Neuropathy (CIPN)</option>
      <option value="53">Chronic Obstructive Pulmonary Disease (COPD)</option>
      <option value="54">Cisplatin-Induced Hearing Loss</option>
      <option value="55">Cisplatin-induced Nephrotoxicity</option>
      <option value="56">CNS-injury induced immunodeficiency syndrome (CIDS)</option>
      <option value="57">Cognitive Function (Decreasing)</option>
      <option value="58">Cough</option>
      <option value="59">Crohn's disease</option>
      <option value="60">Cystitis (Interstitial)</option>
      <option value="61">Depression</option>
      <option value="62">Dermatitis (Allergic, contact)</option>
      <option value="63">Dermatitis (Eczema)</option>
      <option value="64">Diabetes Mellitus</option>
      <option value="65">Dravet Syndrome</option>
      <option value="66">Dupuytren's Contracture</option>
      <option value="67">Emotional and Behavioral Disorders (EBD)</option>
      <option value="68">Encephalitis</option>
      <option value="69">Encephalomyelitis</option>
      <option value="70">Endometriosis</option>
      <option value="71">Epilepsy</option>
      <option value="72">Epstein–Barr Virus</option>
      <option value="73">Excitotoxicity</option>
      <option value="74">Familial Mediterranean Fever</option>
      <option value="75">Fatty Liver Disease (non-alcoholic) aka (Steatosis)</option>
      <option value="76">Febrile Infection-Related Epilepsy Syndrome (FIRES)</option>
      <option value="77">Fever</option>
      <option value="78">Fibromyalgia</option>
      <option value="79">Foot Nail Fungus (Onychomycosis)</option>
      <option value="80">Fractured Bones</option>
      <option value="81">Fungal Infection (Candida albicans)</option>
      <option value="82">Gastro-Esophageal Reflux Disease (GERD)</option>
      <option value="83">Glaucoma</option>
      <option value="84">Graves' Disease</option>
      <option value="85">Hair Growth - Unwanted (Hirsutism)</option>
      <option value="86">Hair Loss (Baldness)</option>
      <option value="87">Heart Disease</option>
      <option value="88">Helminthiasis</option>
      <option value="89">Hepatic Ischemia/Reperfusion Injury</option>
      <option value="90">Hepatitis</option>
      <option value="91">Herpes</option>
      <option value="92">Hiccups (intractable)</option>
      <option value="93">HIV/AIDS</option>
      <option value="94">Huntington's Disease</option>
      <option value="95">Hypertension</option>
      <option value="96">Infertility (male)</option>
      <option value="97">Inflammation-Induced Cognitive Damage</option>
      <option value="98">Inflammatory Bowel Disease (IBD)</option>
      <option value="99">Insomnia</option>
      <option value="100">Intervertebral Disc Degeneration (chronic lower back pain)</option>
      <option value="101">Intimate partner violence (IPV)</option>
      <option value="102">Ischaemia-induced cardiac arrhythmias</option>
      <option value="103">Itching (Pruritis)</option>
      <option value="104">Kidney Disease (Diabetic Nephropathy)</option>
      <option value="105">Kidney Disease (in General)</option>
      <option value="106">Kidney Disease (Obesity-Related Kidney Dysfunction)</option>
      <option value="107">Kidney Disease (Sepsis-Associated Acute Kidney Injury)</option>
      <option value="108">Kidney Failure (Hemodialysis)</option>
      <option value="109">Leishmaniasis</option>
      <option value="110">Lennox-Gastaut syndrome (LGS)</option>
      <option value="111">Libido</option>
      <option value="112">Liver Fibrosis</option>
      <option value="113">Lower Urinary Tract Symptoms (LUTS)</option>
      <option value="114">Lupus</option>
      <option value="115">Malaria</option>
      <option value="116">Manic-Depressive Disorder/Bipolar Affective Disorder (BAD)</option>
      <option value="117">Migraine</option>
      <option value="118">Morning Sickness</option>
      <option value="119">Motion Sickness</option>
      <option value="120">Methicillin-Resistant Staphylococcus Aureus (MRSA)</option>
      <option value="121">Multiple Sclerosis (MS)</option>
      <option value="122">Myasthenia Gravis</option>
      <option value="123">Myocarditis</option>
      <option value="124">Nausea and Vomiting</option>
      <option value="125">Neonatal Encephalopathy</option>
      <option value="126">Neonatal Hypoxia</option>
      <option value="127">Neurodegeneration (in general)</option>
      <option value="128">Neuromyotonia (Isaacs Syndrome)</option>
      <option value="129">Night Vision (Poor)</option>
      <option value="130">Obesity</option>
      <option value="131">Obsessive-Compulsive Disorder (OCD)</option>
      <option value="132">Organ Transplant, Graft Rejection</option>
      <option value="133">Osteoporosis</option>
      <option value="134">Oxidative Stress</option>
      <option value="135">Oxygen-glucose deprivation/reperfusion injury (OGD/RI)</option>
      <option value="136">Pain (Acute)</option>
      <option value="137">Pain (Allodynia)</option>
      <option value="138">Pain (Chronic Non-Malignant)</option>
      <option value="139">Pain (Due to Advanced Cancer)</option>
      <option value="140">Pain (Eye)</option>
      <option value="141">Pain (Menstrual)</option>
      <option value="142">Pain (Neuropathies, AIDS-Related)</option>
      <option value="143">Pain (Neuropathies, Diabetes)</option>
      <option value="144">Pain (Neuropathies, in general)</option>
      <option value="145">Pain (nociceptive)</option>
      <option value="146">Pancreatitis</option>
      <option value="147">Parkinson's Disease</option>
      <option value="148">Periodontitis</option>
      <option value="149">Pneumococcal meningitis</option>
      <option value="150">Post Ebola Syndrome</option>
      <option value="151">Post-Surgery Wounds</option>
      <option value="152">Post-Traumatic Stress Disorder</option>
      <option value="153">Pregnancy</option>
      <option value="154">Prion Diseases (Transmissible Spongiform Encephalopathies)</option>
      <option value="155">Psoriasis</option>
      <option value="156">Psychosis</option>
      <option value="157">Respiratory Syncytial Virus</option>
      <option value="158">Retinal Disease</option>
      <option value="159">Rheumatoid Arthritis</option>
      <option value="160">Schizophrenia</option>
      <option value="161">Scleroderma</option>
      <option value="162">Seborrhea</option>
      <option value="163">Sepsis</option>
      <option value="164">Sickle Cell Disease</option>
      <option value="165">Skin Diseases (in general)</option>
      <option value="166">Sleep Apnea</option>
      <option value="167">Spasticity (Pediatric)</option>
      <option value="168">Spinal Cord Injuries</option>
      <option value="169">Stress</option>
      <option value="170">Stroke</option>
      <option value="171">Sturge-Weber Syndrome</option>
      <option value="172">Systemic Sclerosis</option>
      <option value="173">Tourette Syndrome</option>
      <option value="174">Toxic shock syndrome</option>
      <option value="175">Trauma (physical)</option>
      <option value="176">Traumatic Brain Injury</option>
      <option value="177">Trichotillomania (compulsive hair pulling)</option>
      <option value="178">Tuberculosis</option>
      <option value="179">Tuberous sclerosis complex</option>
      <option value="180">Urinary incontinence</option>
      <option value="181">Uveitis</option>
      <option value="182">Vascular Dementia</option>
      <option value="183">Wilson's Disease</option>
    </select>
  </div>

  <div class="form-group">
    <label for="type_of_study">Type of Study:</label>
     <input type="radio" class="form-control" name="type_of_study" value="Laboratory Study" /> Laboratory
    <input type="radio" class="form-control" name="type_of_study" value="Animal Study" /> Animal study
    <input type="radio" class="form-control" name="type_of_study" value="Meta Case Study" /> Meta case study <br />
    <input type="radio" class="form-control" name="type_of_study" value="Human Trial" /> Human Trial
    <input type="radio" class="form-control" name="type_of_study" value="Double blind Human Trial" /> Double blind human trial
  </div>

  <div class="form-group">
    <label for="key_findings">Key Findings:</label>
    <textarea class="form-control" name="key_findings" rows="4"></textarea>
  </div>

  <div class="form-group">
    <label for="chi_rating">CHI Rating:</label>
    <input type="radio" class="form-control" name="chi_rating" value="1" />+1 
    <input type="radio" class="form-control" name="chi_rating" value="2" />+2 
    <input type="radio" class="form-control" name="chi_rating" value="3" />+3 
    <input type="radio" class="form-control" name="chi_rating" value="4" />+4 
    <input type="radio" class="form-control" name="chi_rating" value="5" />+5 <br/>
    <input type="radio" class="form-control" name="chi_rating" value="-1" />-1
    <input type="radio" class="form-control" name="chi_rating" value="-2" />-2     
    <input type="radio" class="form-control" name="chi_rating" value="-3" />-3 
    <input type="radio" class="form-control" name="chi_rating" value="-4" />-4 
    <input type="radio" class="form-control" name="chi_rating" value="-5" />-5  
  </div>

    <div class="form-group">
    <label for="cannabinoid_id">Cannabinoids:</label>
    <input type="checkbox" class="form-control" name="cannabinoid_id" value="1"/> CBC
    <input type="checkbox" class="form-control" name="cannabinoid_id" value="2"/> CBD
    <input type="checkbox" class="form-control" name="cannabinoid_id" value="3"/> CBG
    <input type="checkbox" class="form-control" name="cannabinoid_id" value="4"/> THC
    <input type="checkbox" class="form-control" name="cannabinoid_id" value="5"/> CBN <br/>
    <input type="checkbox" class="form-control" name="cannabinoid_id" value="6"/> CBC-Acid
    <input type="checkbox" class="form-control" name="cannabinoid_id" value="7"/> CBD-Acid
    <input type="checkbox" class="form-control" name="cannabinoid_id" value="8"/> CBG-Acid
    <input type="checkbox" class="form-control" name="cannabinoid_id" value="9"/> THC-Acid<br />
    <input type="checkbox" class="form-control" name="cannabinoid_id" value="99"/> N/A
  </div>

      <div class="form-group">
    <label for="terpene_id">Terpenes:</label>
      <input type="checkbox" class="form-control" name="terpene_id" value="1"/> ß-Caryophyllene
      <input type="checkbox" class="form-control" name="terpene_id" value="2"/> Borneol
      <input type="checkbox" class="form-control" name="terpene_id" value="3"/> Camphene
      <input type="checkbox" class="form-control" name="terpene_id" value="4"/> Eucalyptol<br/>
      <input type="checkbox" class="form-control" name="terpene_id" value="5"/> Geraniol
      <input type="checkbox" class="form-control" name="terpene_id" value="6"/> Humulene
      <input type="checkbox" class="form-control" name="terpene_id" value="7"/> Limonene
      <input type="checkbox" class="form-control" name="terpene_id" value="8"/> Linalool<br/>
      <input type="checkbox" class="form-control" name="terpene_id" value="9"/> Myrcene
      <input type="checkbox" class="form-control" name="terpene_id" value="10"/> Nerolidol
      <input type="checkbox" class="form-control" name="terpene_id" value="11"/> Ocimene
      <input type="checkbox" class="form-control" name="terpene_id" value="12"/> Phytol<br/>
      <input type="checkbox" class="form-control" name="terpene_id" value="13"/> Pinene
      <input type="checkbox" class="form-control" name="terpene_id" value="14"/> Terpineol
      <input type="checkbox" class="form-control" name="terpene_id" value="15"/> Terpinolene
      <input type="checkbox" class="form-control" name="terpene_id" value="99"/> N/A
  </div>
  <div class="form-group">
    <label for="receptor_id">Receptors:</label>
    <input type="checkbox" class="form-control get_value" name="receptor_id" value="1"/> CB1
    <input type="checkbox" class="form-control get_value" name="receptor_id" value="2"/> CB2
    <input type="checkbox" class="form-control get_value" name="receptor_id" value="3"/> Endocannabinoid metabolizing enzymes
    <input type="checkbox" class="form-control get_value" name="receptor_id" value="4"/> TRPs<br/>
    <input type="checkbox" class="form-control get_value" name="receptor_id" value="5"/> PPARs 
    <input type="checkbox" class="form-control get_value" name="receptor_id" value="6"/> Other GPCR
    <input type="checkbox" class="form-control get_value" name="receptor_id" value="7"/> Neurotransmitter modulations
    <input type="checkbox" class="form-control get_value" name="receptor_id" value="99"/> N/A
  </div>

      <div class="form-group">
    <label for="neurotransmitter_id">Neurotransmitters:</label>
      <input type="checkbox" class="form-control" name="neurotransmitter_id" value="1"/> Acetylcholine
      <input type="checkbox" class="form-control" name="neurotransmitter_id" value="2"/> Anandamide
      <input type="checkbox" class="form-control" name="neurotransmitter_id" value="3"/> Anti-inflammatory cytokines
      <input type="checkbox" class="form-control" name="neurotransmitter_id" value="4"/> Cortisol<br/>
      <input type="checkbox" class="form-control" name="neurotransmitter_id" value="5"/> Dopamine
      <input type="checkbox" class="form-control" name="neurotransmitter_id" value="6"/> Endogenous opioids
      <input type="checkbox" class="form-control" name="neurotransmitter_id" value="7"/> Epinephrine
      <input type="checkbox" class="form-control" name="neurotransmitter_id" value="8"/> Estrogen<br/>
      <input type="checkbox" class="form-control" name="neurotransmitter_id" value="9"/> GABA
      <input type="checkbox" class="form-control" name="neurotransmitter_id" value="10"/> Ghrelin
      <input type="checkbox" class="form-control" name="neurotransmitter_id" value="11"/> Glucagon
      <input type="checkbox" class="form-control" name="neurotransmitter_id" value="12"/> Glutamate<br/>
      <input type="checkbox" class="form-control" name="neurotransmitter_id" value="13"/> Insulin
      <input type="checkbox" class="form-control" name="neurotransmitter_id" value="14"/> Leptin
      <input type="checkbox" class="form-control" name="neurotransmitter_id" value="15"/> Norepinephrine
      <input type="checkbox" class="form-control" name="neurotransmitter_id" value="16"/> Oxytocin
      <input type="checkbox" class="form-control" name="neurotransmitter_id" value="17"/> Serotonin<br/>
      <input type="checkbox" class="form-control" name="neurotransmitter_id" value="18"/> Testosterone
      <input type="checkbox" class="form-control" name="neurotransmitter_id" value="19"/> Pro-inflammatory cytokines
      <input type="checkbox" class="form-control" name="neurotransmitter_id" value="20"/> Vasopressin
      <input type="checkbox" class="form-control" name="neurotransmitter_id" value="99"/> N/A
  </div>

      <div class="form-group">
    <label for="year_of_pub">Year of Publication:</label>
    <input type="number" class="form-control" name="year_of_pub" value="2018">
  </div>

      <div class="form-group">
    <label for="doi">DOI:</label>
    <input type="text" class="form-control" name="doi">
  </div>

      <div class="form-group">
    <label for="link_to_study">Link to Study:</label>
    <input type="url" class="form-control" name="link_to_study">
  </div>

      <div class="form-group">
    <label for="chemotype_id">Chemotype:</label>
    <input type="checkbox" class="form-control get_value" name="chemotype_id[]" value="1" />Chemotype I<br />
    <input type="checkbox" class="form-control get_value" name="chemotype_id[]" value="2" />Chemotype II<br />
    <input type="checkbox" class="form-control get_value" name="chemotype_id[]" value="3" />Chemotype III<br />
    <input type="checkbox" class="form-control get_value" name="chemotype_id[]" value="4" />N/A<br />
  </div>

        <div class="form-group">
    <label for="log_entry">Date of Entry:</label>
    <input type="date" class="form-control" name="log_entry">
  </div>

  <button type="submit" id="submit" name="BtnSubmit" class="btn btn-default">Submit</button>


</div>



<?php get_footer();
