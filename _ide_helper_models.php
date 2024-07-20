<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\ClaimAssessment
 *
 * @property string $id
 * @property string $requestId
 * @property string $claimAssessmentNumber
 * @property string $claimIntimationNumber
 * @property string $claimReferenceNumber
 * @property string $coverNoteReferenceNumber
 * @property string|null $assessmentReceivedDate
 * @property string $assessmentReportSummary
 * @property string $currencyCode
 * @property float $exchangeRate
 * @property float $assessmentAmount
 * @property float $approvedClaimAmount
 * @property string|null $claimApprovalDate
 * @property string $claimApprovalAuthority
 * @property string $isReAssessment
 * @property string|null $responseId
 * @property string|null $responseStatusCode
 * @property string|null $responseStatusDesc
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ClaimAssessmentClaimant> $claim_assessment_claimant
 * @property-read int|null $claim_assessment_claimant_count
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimAssessment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimAssessment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimAssessment query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimAssessment whereApprovedClaimAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimAssessment whereAssessmentAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimAssessment whereAssessmentReceivedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimAssessment whereAssessmentReportSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimAssessment whereClaimApprovalAuthority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimAssessment whereClaimApprovalDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimAssessment whereClaimAssessmentNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimAssessment whereClaimIntimationNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimAssessment whereClaimReferenceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimAssessment whereCoverNoteReferenceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimAssessment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimAssessment whereCurrencyCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimAssessment whereExchangeRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimAssessment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimAssessment whereIsReAssessment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimAssessment whereRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimAssessment whereResponseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimAssessment whereResponseStatusCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimAssessment whereResponseStatusDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimAssessment whereUpdatedAt($value)
 */
	class ClaimAssessment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ClaimAssessmentClaimant
 *
 * @property string $id
 * @property string $claim_assessment_id
 * @property int $claimantCategory
 * @property int $claimantType
 * @property string $claimantIdNumber
 * @property int $claimantIdType
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ClaimAssessment $claimAssessment
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimAssessmentClaimant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimAssessmentClaimant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimAssessmentClaimant query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimAssessmentClaimant whereClaimAssessmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimAssessmentClaimant whereClaimantCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimAssessmentClaimant whereClaimantIdNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimAssessmentClaimant whereClaimantIdType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimAssessmentClaimant whereClaimantType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimAssessmentClaimant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimAssessmentClaimant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimAssessmentClaimant whereUpdatedAt($value)
 */
	class ClaimAssessmentClaimant extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ClaimIntimation
 *
 * @property string $id
 * @property string $requestId
 * @property string $claimIntimationNumber
 * @property string $claimReferenceNumber
 * @property string $coverNoteReferenceNumber
 * @property string|null $claimIntimationDate
 * @property string $currencyCode
 * @property float $exchangeRate
 * @property float $claimEstimatedAmount
 * @property float $claimReserveAmount
 * @property string $claimReserveMethod
 * @property int $lossAssessmentOption
 * @property string $assessorName
 * @property string $assessorIdNumber
 * @property int $assessorIdType
 * @property string|null $responseId
 * @property string|null $responseStatusCode
 * @property string|null $responseStatusDesc
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ClaimIntimationClaimant> $claim_intimation_claimant
 * @property-read int|null $claim_intimation_claimant_count
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimation query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimation whereAssessorIdNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimation whereAssessorIdType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimation whereAssessorName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimation whereClaimEstimatedAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimation whereClaimIntimationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimation whereClaimIntimationNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimation whereClaimReferenceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimation whereClaimReserveAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimation whereClaimReserveMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimation whereCoverNoteReferenceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimation whereCurrencyCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimation whereExchangeRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimation whereLossAssessmentOption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimation whereRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimation whereResponseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimation whereResponseStatusCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimation whereResponseStatusDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimation whereUpdatedAt($value)
 */
	class ClaimIntimation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ClaimIntimationClaimant
 *
 * @property string $id
 * @property string $claim_intimation_id
 * @property string $claimantName
 * @property string $claimantBirthDate
 * @property int $claimantCategory
 * @property int $claimantType
 * @property string $claimantIdNumber
 * @property int $claimantIdType
 * @property string|null $gender
 * @property string $countryCode
 * @property string $region
 * @property string $district
 * @property string|null $street
 * @property string $claimantPhoneNumber
 * @property string|null $claimantFax
 * @property string|null $postalAddress
 * @property string|null $emailAddress
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ClaimIntimation $claimIntimation
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimationClaimant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimationClaimant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimationClaimant query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimationClaimant whereClaimIntimationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimationClaimant whereClaimantBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimationClaimant whereClaimantCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimationClaimant whereClaimantFax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimationClaimant whereClaimantIdNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimationClaimant whereClaimantIdType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimationClaimant whereClaimantName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimationClaimant whereClaimantPhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimationClaimant whereClaimantType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimationClaimant whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimationClaimant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimationClaimant whereDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimationClaimant whereEmailAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimationClaimant whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimationClaimant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimationClaimant wherePostalAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimationClaimant whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimationClaimant whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimIntimationClaimant whereUpdatedAt($value)
 */
	class ClaimIntimationClaimant extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ClaimNotification
 *
 * @property string $id
 * @property string $requestId
 * @property string $claimNotificationNumber
 * @property string $coverNoteReferenceNumber
 * @property string|null $claimReferenceNumber
 * @property string|null $claimReportDate
 * @property string $claimFormDullyFilled
 * @property string|null $lossDate
 * @property string $lossNature
 * @property string $lossType
 * @property string $lossLocation
 * @property string $officerName
 * @property string $officerTitle
 * @property string|null $responseId
 * @property string|null $responseStatusCode
 * @property string|null $responseStatusDesc
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimNotification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimNotification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimNotification query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimNotification whereClaimFormDullyFilled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimNotification whereClaimNotificationNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimNotification whereClaimReferenceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimNotification whereClaimReportDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimNotification whereCoverNoteReferenceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimNotification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimNotification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimNotification whereLossDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimNotification whereLossLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimNotification whereLossNature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimNotification whereLossType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimNotification whereOfficerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimNotification whereOfficerTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimNotification whereRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimNotification whereResponseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimNotification whereResponseStatusCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimNotification whereResponseStatusDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimNotification whereUpdatedAt($value)
 */
	class ClaimNotification extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ClaimPayment
 *
 * @property string $id
 * @property string $requestId
 * @property string $claimPaymentNumber
 * @property string $claimReferenceNumber
 * @property string $claimIntimationNumber
 * @property string $coverNoteReferenceNumber
 * @property string|null $paymentDate
 * @property float $paidAmount
 * @property int $paymentMode
 * @property string $partiesNotified
 * @property float $netPremiumEarned
 * @property string $claimResultedLitigation
 * @property string $litigationReason
 * @property string $currencyCode
 * @property float $exchangeRate
 * @property string|null $responseId
 * @property string|null $responseStatusCode
 * @property string|null $responseStatusDesc
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ClaimPaymentClaimant> $claimants
 * @property-read int|null $claimants_count
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimPayment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimPayment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimPayment query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimPayment whereClaimIntimationNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimPayment whereClaimPaymentNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimPayment whereClaimReferenceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimPayment whereClaimResultedLitigation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimPayment whereCoverNoteReferenceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimPayment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimPayment whereCurrencyCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimPayment whereExchangeRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimPayment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimPayment whereLitigationReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimPayment whereNetPremiumEarned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimPayment wherePaidAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimPayment wherePartiesNotified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimPayment wherePaymentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimPayment wherePaymentMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimPayment whereRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimPayment whereResponseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimPayment whereResponseStatusCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimPayment whereResponseStatusDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimPayment whereUpdatedAt($value)
 */
	class ClaimPayment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ClaimPaymentClaimant
 *
 * @property string $id
 * @property string $claim_payment_id
 * @property int $claimantCategory
 * @property int $claimantType
 * @property string $claimantIdNumber
 * @property int $claimantIdType
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ClaimPayment $claimPayment
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimPaymentClaimant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimPaymentClaimant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimPaymentClaimant query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimPaymentClaimant whereClaimPaymentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimPaymentClaimant whereClaimantCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimPaymentClaimant whereClaimantIdNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimPaymentClaimant whereClaimantIdType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimPaymentClaimant whereClaimantType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimPaymentClaimant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimPaymentClaimant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimPaymentClaimant whereUpdatedAt($value)
 */
	class ClaimPaymentClaimant extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ClaimRejection
 *
 * @property string $id
 * @property string $requestId
 * @property string $claimRejectionNumber
 * @property string $claimReferenceNumber
 * @property string $claimIntimationNumber
 * @property string $coverNoteReferenceNumber
 * @property string|null $rejectionDate
 * @property string $rejectionReason
 * @property string $claimResultedLitigation
 * @property float $claimAmount
 * @property string $currencyCode
 * @property float $exchangeRate
 * @property string|null $responseId
 * @property string|null $responseStatusCode
 * @property string|null $responseStatusDesc
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ClaimRejectionClaimant> $claimants
 * @property-read int|null $claimants_count
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimRejection newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimRejection newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimRejection query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimRejection whereClaimAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimRejection whereClaimIntimationNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimRejection whereClaimReferenceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimRejection whereClaimRejectionNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimRejection whereClaimResultedLitigation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimRejection whereCoverNoteReferenceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimRejection whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimRejection whereCurrencyCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimRejection whereExchangeRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimRejection whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimRejection whereRejectionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimRejection whereRejectionReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimRejection whereRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimRejection whereResponseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimRejection whereResponseStatusCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimRejection whereResponseStatusDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimRejection whereUpdatedAt($value)
 */
	class ClaimRejection extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ClaimRejectionClaimant
 *
 * @property string $id
 * @property string $claim_rejection_id
 * @property int $claimantCategory
 * @property int $claimantType
 * @property string $claimantIdNumber
 * @property int $claimantIdType
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ClaimRejection $claimRejection
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimRejectionClaimant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimRejectionClaimant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimRejectionClaimant query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimRejectionClaimant whereClaimRejectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimRejectionClaimant whereClaimantCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimRejectionClaimant whereClaimantIdNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimRejectionClaimant whereClaimantIdType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimRejectionClaimant whereClaimantType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimRejectionClaimant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimRejectionClaimant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClaimRejectionClaimant whereUpdatedAt($value)
 */
	class ClaimRejectionClaimant extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Country
 *
 * @property string $id
 * @property string $name
 * @property string $code
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereUpdatedAt($value)
 */
	class Country extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CoverCategory
 *
 * @property string $id
 * @property string $secure_token
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|CoverCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CoverCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CoverCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|CoverCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverCategory whereSecureToken($value)
 */
	class CoverCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CoverNoteAddon
 *
 * @property string $id
 * @property string $quotation_id
 * @property string|null $addonReference
 * @property string|null $addonDesc
 * @property float|null $addonAmount
 * @property float|null $addonPremiumRate
 * @property float|null $premiumExcludingTax
 * @property float|null $premiumExcludingTaxEquivalent
 * @property float|null $premiumIncludingTax
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CoverNoteAddonTax|null $addon_tax
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CoverNoteAddonTax> $addon_taxes
 * @property-read int|null $addon_taxes_count
 * @property-read \App\Models\Quotation $quotation
 * @method static \Illuminate\Database\Eloquent\Builder|CoverNoteAddon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CoverNoteAddon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CoverNoteAddon query()
 * @method static \Illuminate\Database\Eloquent\Builder|CoverNoteAddon whereAddonAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverNoteAddon whereAddonDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverNoteAddon whereAddonPremiumRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverNoteAddon whereAddonReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverNoteAddon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverNoteAddon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverNoteAddon wherePremiumExcludingTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverNoteAddon wherePremiumExcludingTaxEquivalent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverNoteAddon wherePremiumIncludingTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverNoteAddon whereQuotationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverNoteAddon whereUpdatedAt($value)
 */
	class CoverNoteAddon extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CoverNoteAddonTax
 *
 * @property string $id
 * @property string $cover_note_addon_id
 * @property string $taxCode
 * @property string $isTaxExempted
 * @property string|null $taxExemptionType
 * @property string|null $taxExemptionReference
 * @property float $taxRate
 * @property float $taxAmount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CoverNoteAddon|null $quotation
 * @method static \Illuminate\Database\Eloquent\Builder|CoverNoteAddonTax newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CoverNoteAddonTax newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CoverNoteAddonTax query()
 * @method static \Illuminate\Database\Eloquent\Builder|CoverNoteAddonTax whereCoverNoteAddonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverNoteAddonTax whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverNoteAddonTax whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverNoteAddonTax whereIsTaxExempted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverNoteAddonTax whereTaxAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverNoteAddonTax whereTaxCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverNoteAddonTax whereTaxExemptionReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverNoteAddonTax whereTaxExemptionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverNoteAddonTax whereTaxRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverNoteAddonTax whereUpdatedAt($value)
 */
	class CoverNoteAddonTax extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CoverProduct
 *
 * @property string $id
 * @property string|null $cover_category_id
 * @property string $product_code
 * @property string $product_name
 * @property-read \App\Models\CoverCategory|null $category
 * @method static \Illuminate\Database\Eloquent\Builder|CoverProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CoverProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CoverProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|CoverProduct whereCoverCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverProduct whereProductCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverProduct whereProductName($value)
 */
	class CoverProduct extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CoverRisk
 *
 * @property string $id
 * @property string $product_id
 * @property string $risk_code
 * @property string $risk_name
 * @property float $premium_rate
 * @property string|null $calculation_type
 * @property float|null $minimum_amount
 * @property float|null $additional_amount
 * @property string|null $limit_start
 * @property float|null $limit_start_value
 * @property string|null $limit_end
 * @property float|null $limit_end_value
 * @property float|null $price
 * @property string $risk_type
 * @property-read \App\Models\CoverProduct $product
 * @method static \Illuminate\Database\Eloquent\Builder|CoverRisk newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CoverRisk newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CoverRisk query()
 * @method static \Illuminate\Database\Eloquent\Builder|CoverRisk whereAdditionalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverRisk whereCalculationType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverRisk whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverRisk whereLimitEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverRisk whereLimitEndValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverRisk whereLimitStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverRisk whereLimitStartValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverRisk whereMinimumAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverRisk wherePremiumRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverRisk wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverRisk whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverRisk whereRiskCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverRisk whereRiskName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoverRisk whereRiskType($value)
 */
	class CoverRisk extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Currency
 *
 * @property string $id
 * @property string $name
 * @property string $code
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Currency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency query()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereUpdatedAt($value)
 */
	class Currency extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DefaultCurrency
 *
 * @property string $id
 * @property string $currency_id
 * @property string $rate
 * @property \App\Enums\SystemStatusEnum $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Currency $currency
 * @method static \Illuminate\Database\Eloquent\Builder|DefaultCurrency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DefaultCurrency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DefaultCurrency query()
 * @method static \Illuminate\Database\Eloquent\Builder|DefaultCurrency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DefaultCurrency whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DefaultCurrency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DefaultCurrency whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DefaultCurrency whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DefaultCurrency whereUpdatedAt($value)
 */
	class DefaultCurrency extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DischargeVoucher
 *
 * @property string $id
 * @property string $requestId
 * @property string $dischargeVoucherNumber
 * @property string $claimAssessmentNumber
 * @property string $claimReferenceNumber
 * @property string $coverNoteReferenceNumber
 * @property string|null $dischargeVoucherDate
 * @property string $currencyCode
 * @property float $exchangeRate
 * @property string|null $claimOfferCommunicationDate
 * @property int $claimOfferAmount
 * @property string|null $claimantResponseDate
 * @property string|null $adjustmentDate
 * @property string $adjustmentReason
 * @property float $adjustmentAmount
 * @property string|null $reconciliationDate
 * @property string $reconciliationSummary
 * @property float $reconciledAmount
 * @property string $offerAccepted
 * @property string|null $responseId
 * @property string|null $responseStatusCode
 * @property string|null $responseStatusDesc
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DischargeVoucherClaimant> $claimants
 * @property-read int|null $claimants_count
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucher query()
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucher whereAdjustmentAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucher whereAdjustmentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucher whereAdjustmentReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucher whereClaimAssessmentNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucher whereClaimOfferAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucher whereClaimOfferCommunicationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucher whereClaimReferenceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucher whereClaimantResponseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucher whereCoverNoteReferenceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucher whereCurrencyCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucher whereDischargeVoucherDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucher whereDischargeVoucherNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucher whereExchangeRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucher whereOfferAccepted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucher whereReconciledAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucher whereReconciliationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucher whereReconciliationSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucher whereRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucher whereResponseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucher whereResponseStatusCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucher whereResponseStatusDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucher whereUpdatedAt($value)
 */
	class DischargeVoucher extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DischargeVoucherClaimant
 *
 * @property string $id
 * @property string $discharge_voucher_id
 * @property int $claimantCategory
 * @property int $claimantType
 * @property string $claimantIdNumber
 * @property int $claimantIdType
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\DischargeVoucher|null $claimAssessment
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucherClaimant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucherClaimant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucherClaimant query()
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucherClaimant whereClaimantCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucherClaimant whereClaimantIdNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucherClaimant whereClaimantIdType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucherClaimant whereClaimantType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucherClaimant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucherClaimant whereDischargeVoucherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucherClaimant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DischargeVoucherClaimant whereUpdatedAt($value)
 */
	class DischargeVoucherClaimant extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\District
 *
 * @property string $id
 * @property string $name
 * @property string $code
 * @property string $region_id
 * @property-read \App\Models\Region $region
 * @method static \Illuminate\Database\Eloquent\Builder|District newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|District newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|District query()
 * @method static \Illuminate\Database\Eloquent\Builder|District whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereRegionId($value)
 */
	class District extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MotorDetail
 *
 * @property string $id
 * @property string $quotation_id
 * @property string $motorCategory
 * @property string $motorType
 * @property string $registrationNumber
 * @property string $chassisNumber
 * @property string $make
 * @property string $model
 * @property string $modelNumber
 * @property string $bodyType
 * @property string $color
 * @property string $engineNumber
 * @property string|null $engineCapacity
 * @property string $fuelUsed
 * @property int|null $numberOfAxles
 * @property string|null $axleDistance
 * @property int|null $sittingCapacity
 * @property int|null $yearOfManufacture
 * @property int|null $tareWeight
 * @property int|null $grossWeight
 * @property string|null $motorUsage
 * @property string|null $ownerName
 * @property string|null $ownerCategory
 * @property string|null $ownerAddress
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Quotation $quotation
 * @method static \Illuminate\Database\Eloquent\Builder|MotorDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MotorDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MotorDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|MotorDetail whereAxleDistance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MotorDetail whereBodyType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MotorDetail whereChassisNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MotorDetail whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MotorDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MotorDetail whereEngineCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MotorDetail whereEngineNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MotorDetail whereFuelUsed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MotorDetail whereGrossWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MotorDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MotorDetail whereMake($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MotorDetail whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MotorDetail whereModelNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MotorDetail whereMotorCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MotorDetail whereMotorType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MotorDetail whereMotorUsage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MotorDetail whereNumberOfAxles($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MotorDetail whereOwnerAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MotorDetail whereOwnerCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MotorDetail whereOwnerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MotorDetail whereQuotationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MotorDetail whereRegistrationNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MotorDetail whereSittingCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MotorDetail whereTareWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MotorDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MotorDetail whereYearOfManufacture($value)
 */
	class MotorDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Payment
 *
 * @property string $id
 * @property string|null $name
 * @property string $msisdn
 * @property string|null $email
 * @property float $amount
 * @property string $currency
 * @property string $date
 * @property string $requestId
 * @property string $description
 * @property string|null $respCode
 * @property string|null $respDesc
 * @property string|null $acknowledgementId
 * @property string|null $transactionId
 * @property float|null $paid_amount
 * @property string|null $paid_currency
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Quotation $quotation
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereAcknowledgementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereMsisdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePaidAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePaidCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereRespCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereRespDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUpdatedAt($value)
 */
	class Payment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Permission
 *
 * @property string $id
 * @property string $name
 * @property string|null $display_name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Role> $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereUpdatedAt($value)
 */
	class Permission extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PolicyHolder
 *
 * @property string $id
 * @property string $quotation_id
 * @property string $policyHolderName
 * @property string|null $policyHolderBirthDate
 * @property string $policyHolderType
 * @property string $policyHolderIdNumber
 * @property string $policyHolderIdType
 * @property string|null $gender
 * @property string $countryCode
 * @property string|null $region
 * @property string|null $district
 * @property string|null $street
 * @property string $policyHolderPhoneNumber
 * @property string|null $policyHolderFax
 * @property string|null $postalAddress
 * @property string|null $emailAddress
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Quotation $quotation
 * @method static \Illuminate\Database\Eloquent\Builder|PolicyHolder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PolicyHolder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PolicyHolder query()
 * @method static \Illuminate\Database\Eloquent\Builder|PolicyHolder whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PolicyHolder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PolicyHolder whereDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PolicyHolder whereEmailAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PolicyHolder whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PolicyHolder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PolicyHolder wherePolicyHolderBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PolicyHolder wherePolicyHolderFax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PolicyHolder wherePolicyHolderIdNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PolicyHolder wherePolicyHolderIdType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PolicyHolder wherePolicyHolderName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PolicyHolder wherePolicyHolderPhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PolicyHolder wherePolicyHolderType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PolicyHolder wherePostalAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PolicyHolder whereQuotationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PolicyHolder whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PolicyHolder whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PolicyHolder whereUpdatedAt($value)
 */
	class PolicyHolder extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Quotation
 *
 * @property string $id
 * @property string $requestId
 * @property string $coverNoteType
 * @property string $coverNoteNumber
 * @property string|null $prevCoverNoteReferenceNumber
 * @property string|null $coverNoteReferenceNumber
 * @property string|null $stickerNumber
 * @property string|null $coverNoteStartDate
 * @property string|null $coverNoteEndDate
 * @property string $coverNoteDesc
 * @property string $operativeClause
 * @property string $paymentMode
 * @property string $currencyCode
 * @property float $exchangeRate
 * @property float $totalPremiumExcludingTax
 * @property float $totalPremiumIncludingTax
 * @property string $commisionPaid
 * @property string $commisionRate
 * @property string $officerName
 * @property string $officerTitle
 * @property string $productCode
 * @property string|null $endorsementType
 * @property string|null $endorsementReason
 * @property string|null $endorsementPremiumEarned
 * @property string|null $responseId
 * @property string|null $responseStatusCode
 * @property string|null $responseStatusDesc
 * @property mixed|null $payload
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CoverNoteAddon> $cover_note_addons
 * @property-read int|null $cover_note_addons_count
 * @property-read \App\Models\MotorDetail|null $motor_details
 * @property-read \App\Models\PolicyHolder|null $policy_holder
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PolicyHolder> $policy_holders
 * @property-read int|null $policy_holders_count
 * @property-read \App\Models\Risk|null $risk
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Risk> $risks
 * @property-read int|null $risks_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SubjectMatter> $subject_matters
 * @property-read int|null $subject_matters_count
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereCommisionPaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereCommisionRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereCoverNoteDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereCoverNoteEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereCoverNoteNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereCoverNoteReferenceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereCoverNoteStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereCoverNoteType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereCurrencyCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereEndorsementPremiumEarned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereEndorsementReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereEndorsementType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereExchangeRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereOfficerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereOfficerTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereOperativeClause($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation wherePaymentMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation wherePrevCoverNoteReferenceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereProductCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereResponseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereResponseStatusCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereResponseStatusDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereStickerNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereTotalPremiumExcludingTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereTotalPremiumIncludingTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereUpdatedAt($value)
 */
	class Quotation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Region
 *
 * @property string $id
 * @property string $name
 * @property string $code
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\District> $districts
 * @property-read int|null $districts_count
 * @method static \Illuminate\Database\Eloquent\Builder|Region newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region query()
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereName($value)
 */
	class Region extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Risk
 *
 * @property string $id
 * @property string $quotation_id
 * @property string $riskCode
 * @property float $sumInsured
 * @property float $sumInsuredEquivalent
 * @property float $premiumRate
 * @property float $premiumBeforeDiscount
 * @property float $premiumAfterDiscount
 * @property float $premiumExcludingTaxEquivalent
 * @property float $premiumIncludingTax
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Quotation $quotation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\RiskDiscount> $risk_discounts
 * @property-read int|null $risk_discounts_count
 * @property-read \App\Models\RiskTax|null $risk_tax
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\RiskTax> $risk_taxes
 * @property-read int|null $risk_taxes_count
 * @method static \Illuminate\Database\Eloquent\Builder|Risk newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Risk newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Risk query()
 * @method static \Illuminate\Database\Eloquent\Builder|Risk whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Risk whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Risk wherePremiumAfterDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Risk wherePremiumBeforeDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Risk wherePremiumExcludingTaxEquivalent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Risk wherePremiumIncludingTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Risk wherePremiumRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Risk whereQuotationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Risk whereRiskCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Risk whereSumInsured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Risk whereSumInsuredEquivalent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Risk whereUpdatedAt($value)
 */
	class Risk extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RiskDiscount
 *
 * @property string $id
 * @property string $risk_id
 * @property string|null $discountType
 * @property float|null $discountRate
 * @property float|null $discountAmount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Risk $risk
 * @method static \Illuminate\Database\Eloquent\Builder|RiskDiscount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RiskDiscount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RiskDiscount query()
 * @method static \Illuminate\Database\Eloquent\Builder|RiskDiscount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiskDiscount whereDiscountAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiskDiscount whereDiscountRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiskDiscount whereDiscountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiskDiscount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiskDiscount whereRiskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiskDiscount whereUpdatedAt($value)
 */
	class RiskDiscount extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RiskTax
 *
 * @property string $id
 * @property string $risk_id
 * @property string $taxCode
 * @property string $isTaxExempted
 * @property string|null $taxExemptionType
 * @property string|null $taxExemptionReference
 * @property float $taxRate
 * @property float $taxAmount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Risk $risk
 * @method static \Illuminate\Database\Eloquent\Builder|RiskTax newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RiskTax newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RiskTax query()
 * @method static \Illuminate\Database\Eloquent\Builder|RiskTax whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiskTax whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiskTax whereIsTaxExempted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiskTax whereRiskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiskTax whereTaxAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiskTax whereTaxCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiskTax whereTaxExemptionReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiskTax whereTaxExemptionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiskTax whereTaxRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiskTax whereUpdatedAt($value)
 */
	class RiskTax extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property string $id
 * @property string $name
 * @property string|null $display_name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SubjectMatter
 *
 * @property string $id
 * @property string $quotation_id
 * @property string $subjectMatterReference
 * @property string $subjectMatterDesc
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Quotation $quotation
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectMatter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectMatter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectMatter query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectMatter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectMatter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectMatter whereQuotationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectMatter whereSubjectMatterDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectMatter whereSubjectMatterReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectMatter whereUpdatedAt($value)
 */
	class SubjectMatter extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Tax
 *
 * @property string $id
 * @property string $code
 * @property string $rate
 * @property \App\Enums\SystemStatusEnum $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Tax newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tax newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tax query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tax whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tax whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tax whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tax whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tax whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tax whereUpdatedAt($value)
 */
	class Tax extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\USSDRequest
 *
 * @property string $id
 * @property string $sessionId
 * @property string|null $serviceCode
 * @property string $phoneNumber
 * @property string|null $networkCode
 * @property string|null $user
 * @property string|null $pass
 * @property string|null $transactionId
 * @property string|null $requestType
 * @property string|null $ussdgwId
 * @property string|null $motorRegistrationNumber
 * @property string|null $make
 * @property string|null $model
 * @property string|null $bodyType
 * @property string|null $color
 * @property string|null $productCode
 * @property string|null $productName
 * @property string|null $prevRiskCode
 * @property string|null $riskCode
 * @property string|null $riskName
 * @property string|null $sittingCapacity
 * @property string|null $grossWeight
 * @property float $sumInsured
 * @property float $totalPremiumExcludingTax
 * @property float $premiumRate
 * @property float $taxAmount
 * @property float $totalPremiumIncludingTax
 * @property int|null $ownerCategory
 * @property int|null $idType
 * @property string|null $idNumber
 * @property \App\Enums\UssdStatusEnum|null $status
 * @property string|null $quotationRequestId
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest whereBodyType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest whereGrossWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest whereIdNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest whereIdType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest whereMake($value)
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest whereMotorRegistrationNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest whereNetworkCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest whereOwnerCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest wherePass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest wherePremiumRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest wherePrevRiskCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest whereProductCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest whereQuotationRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest whereRequestType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest whereRiskCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest whereRiskName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest whereServiceCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest whereSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest whereSittingCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest whereSumInsured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest whereTaxAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest whereTotalPremiumExcludingTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest whereTotalPremiumIncludingTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest whereUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|USSDRequest whereUssdgwId($value)
 */
	class USSDRequest extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property string $id
 * @property string|null $first_name
 * @property string|null $middle_name
 * @property string|null $last_name
 * @property string|null $email
 * @property string $phone
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $two_factor_confirmed_at
 * @property string $language
 * @property \App\Enums\UserStatusEnum $status
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $title
 * @property-read mixed $name
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read string $profile_photo_url
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User orWhereHasPermission(\BackedEnum|array|string $permission = '', ?mixed $team = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User orWhereHasRole(\BackedEnum|array|string $role = '', ?mixed $team = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDoesntHavePermissions()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDoesntHaveRoles()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereHasPermission(\BackedEnum|array|string $permission = '', ?mixed $team = null, string $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|User whereHasRole(\BackedEnum|array|string $role = '', ?mixed $team = null, string $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorConfirmedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent implements \Laratrust\Contracts\LaratrustUser {}
}

namespace App\Models{
/**
 * App\Models\UssdUser
 *
 * @property string $id
 * @property string $phone
 * @property string $language
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UssdUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UssdUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UssdUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|UssdUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UssdUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UssdUser whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UssdUser wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UssdUser whereUpdatedAt($value)
 */
	class UssdUser extends \Eloquent {}
}

