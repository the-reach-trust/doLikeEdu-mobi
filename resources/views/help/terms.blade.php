@extends('layouts.master')

@section('title', config('app.name').' - Terms &amp; Conditions')

@section('content')

@section('content')

<div id="page">
	<div class="inner">
		<div class="space"></div>
		<div class="container">
			<div class="row">

				@include( 'partials.progresspanel.lg' )

				<div class="{{ get_body_class( Request::route(), true ) }}">
					<p lang="en-US">
						<a name="_GoBack"></a>
						<strong>Terms &amp; Conditions</strong>
					</p>
					<p lang="en-US">
						<strong>DO LIKE EDU TERMS OF USE</strong>
					</p>
					<ol>
						<li>
							<p lang="en-US">
								<strong>Introduction</strong>
							</p>
							<ol>
								<li>
									<p lang="en-US">
										DoLikeEdu is a mobile learning service brought to Namibian
										learners by the The Reach Trust on behalf of Ministry of
										Education, Arts and Culture and UNICEF. (also referred to
										as "<strong>us</strong>" or "<strong>we</strong>").
									</p>
								</li>
								<li>
									<p lang="en-US">
										These Terms of Use bind you from the moment you register
										with DoLikeEdu.
									</p>
								</li>
							</ol>
						</li>
					</ol>
					<ol start="2">
						<li>
							<p lang="en-US">
								<strong>Product terms and conditions</strong>
							</p>
						</li>
						<li>
							<p lang="en-US">
								<strong>"If there is a conflict between the DoLikeEdu Terms of Use and the
								terms and conditions of a third party that is involved in rendering
								the DoLikeEdu services to you, these Terms of Use will overrule the
								third party's terms and conditions."</strong>
							</p>
							<ol>
								<li>
									<p lang="en-US">
										We sometimes refer to information that is available outside
										DoLikeEdu. It is your responsibility to familiarise
										yourself with external information.
									</p>
								</li>
							</ol>
						</li>
					</ol>
					<ol start="4">
						<li>
							<p lang="en-US">
								<strong>Content</strong>
							</p>
							<ol>
								<li>
									<p lang="en-US">
										The content on DoLikeEdu is designed to highlight and
										explain parts of the school curriculum. We will do our
										reasonable best to ensure the content is accurate, complete
										of a high quality and representative of the entire
										curriculum, but you remain responsible to compare our
										content with the material you receive from your school. The
										material given to you by your school remains at all times
										the original version that you must use when studying and
										preparing for your assessments.
									</p>
								</li>
								<li>
									<p lang="en-US">
										We do not accept liability for the information or data on
										any third party website or service, even if we have
										included a hyperlink to such information or data on our own
										site.
									</p>
								</li>
							</ol>
						</li>
					</ol>
					<ol start="5">
						<li>
							<p lang="en-US">
								<strong>Points</strong>
							</p>
							<ol>
								<li>
									<p lang="en-US">
										You can earn points when you successfully participate in
										quizzes available on DoLikeEdu. The quizzes are designed to
										test your understanding of the content.
									</p>
								</li>
								<li>
									<p lang="en-US">
										We reserve the right to alter, modify and update the terms
										associated with points on DoLikeEdu at any time.
									</p>
								</li>
							</ol>
						</li>
					</ol>
					<ol start="6">
						<li>
							<p lang="en-US">
								<strong>Password and Security</strong>
							</p>
							<ol>
								<li>
									<p lang="en-US">
										When you register with DoLikeEdu you will log in using your
										contact number and chosen password. By registering with
										DoLikeEdu you give us permission to obtain the information
										that you have given permission to.
									</p>
								</li>
								<li>
									<p lang="en-US">
										It is your responsibility to keep your log in details
										confidential. DoLikeEdu may from time to time publish
										guidelines on how to protect your log in details and it is
										your responsibility to follow such guidelines.
									</p>
								</li>
								<li>
									<p lang="en-US">
										You must immediately notify us if your log in details have
										been compromised.
									</p>
								</li>
								<li>
									<p lang="en-US">
										Never disclose your password to anyone, including to
										members of our staff.
									</p>
								</li>
								<li>
									<p lang="en-US">
										Whenever you are logged into DoLikeEdu we will assume that
										it is you and we will execute the instructions given during
										such session.
									</p>
								</li>
								<li>
									<p lang="en-US">
										Please note that information sent through unsecured
										telecommunications networks can be subject to monitoring
										(unlawful or not). This is beyond the control of DoLikeEdu.
									</p>
								</li>
							</ol>
						</li>
					</ol>
					<ol start="7">
						<li>
							<p lang="en-US">
								<strong>Privacy</strong>
							</p>
							<ol>
								<li>
									<p lang="en-US">
										We take your privacy seriously and we take all reasonable
										care to protect it where appropriate.
									</p>
								</li>
								<li>
									<p lang="en-US">
										By using DoLikeEdu, you give us permission (consent) to
										collect, use and share your personal information.
									</p>
								</li>
								<li>
									<p lang="en-US">
										We only use personal information in terms of the law, but
										we cannot guarantee your privacy in all circumstances. We
										use most of your personal information to provide the
										DoLikeEdu services and do statistical research on use of
										DoLikeEdu. Individual users cannot normally be identified
										from these statistics.
									</p>
								</li>
							</ol>
						</li>
					</ol>
					<ol start="8">
						<li>
							<p lang="en-US">
								<strong>Availability</strong>
							</p>
							<ol>
								<li>
									<p lang="en-US">
										DoLikeEdu may at times not be available for various reasons
										and we have the discretion to suspend the service.
									</p>
								</li>
								<li>
									<p lang="en-US">
										If DoLikeEdu is not available for whatever reason, we shall
										not be liable for any losses you may suffer as a
										consequence.
									</p>
								</li>
							</ol>
						</li>
					</ol>
					<ol start="9">
						<li>
							<p lang="en-US">
								<strong>Intellectual Property Rights</strong>
							</p>
							<ol>
								<li>
									<p lang="en-US">
										Some of the content on DoLikeEdu has been provided to us by
										third parties. Depending on the circumstances, Ministry of
										Education, Arts and Culture retain copyright and other
										intellectual property rights in all material, including
										logos and other graphics and multimedia works published on
										DoLikeEdu. You may only use the content for personal use
										and may not be used not for any commercial purposes.
									</p>
								</li>
								<li>
									<p lang="en-US">
										The logos and trademarks shown on DoLikeEdu are our
										registered and unregistered trademarks or that of third
										parties.
									</p>
								</li>
								<li>
									<p lang="en-US">
										Nothing on this Terms of Use should be construed as
										granting you any license or right to use any intellectual
										property rights without our prior written permission and/or
										that of third parties, as the case may be.
									</p>
								</li>
								<li>
									<p lang="en-US">
										If you submit any content to DoLikeEdu, you grant us a
										transferable, perpetual, worldwide and royalty free license
										to use the content in any manner whatsoever. If the
										intellectual property rights of any content submitted by
										yourself is owned by a third party, you undertake to notify
										us immediately. You indemnify us against any claims that
										such third party may bring against us for the use of third
										party content submitted to DoLikeEdu by yourself.
									</p>
								</li>
							</ol>
						</li>
					</ol>
					<ol start="10">
						<li>
							<p lang="en-US">
								<strong>Disclaimer</strong>
							</p>
							<ol>
								<li>
									<p lang="en-US">
										We do not give any warranties, guarantees and / or
										representations, whether implied or applicable by law,
										other than the warranties expressly given in the Terms of
										Use.
									</p>
								</li>
							</ol>
						</li>
					</ol>
					<ol start="11">
						<li>
							<p lang="en-US">
								<strong>Notices</strong>
							</p>
							<ol>
								<li>
									<p lang="en-US">
										We shall send notices, irrespective of the medium of
										communication, that may be required by law or by this
										agreement to any of the addresses you designate on your
										personal profile. If a notice has been sent electronically
										it will be deemed that you received it 24 hours after we
										have dispatched the notice.
									</p>
								</li>
							</ol>
						</li>
					</ol>
					<ol start="12">
						<li>
							<p lang="en-US">
								<strong>Liability</strong>
							</p>
							<ol>
								<li>
									<p lang="en-US">
										We shall not be held responsible for any injury, loss,
										expense or damage of any kind whatsoever suffered or
										incurred by you as a result of using DoLikeEdu or relying
										on any information or content contained on DoLikeEdu,
										including but not limited to any injury, loss or damage
										suffered as a result of:
									</p>
									<ol>
										<li>
											<p lang="en-US">
												errors or discrepancies in the information
												provided;
											</p>
										</li>
										<li>
											<p lang="en-US">
												any breakdown or failure of any equipment used to
												access DoLikeEdu; or
											</p>
										</li>
										<li>
											<p lang="en-US">
												the unavailability of DoLikeEdu.
											</p>
										</li>
									</ol>
								</li>
								<li>
									<p lang="en-US">
										We reserve the right to alter, modify, upgrade, update,
										suspend or withdraw DoLikeEdu or any part hereof at any
										time.
									</p>
								</li>
								<li>
									<p lang="en-US">
										You are entirely responsible for all content that you
										access, upload, post, email or otherwise transmit via
										DoLikeEdu. We are not liable for loss of any content you
										transmit and you should keep a backup copy of all such
										content.
									</p>
								</li>
							</ol>
						</li>
					</ol>
					<ol start="13">
						<li>
							<p lang="en-US">
								<strong>General</strong>
							</p>
							<ol>
								<li>
									<p lang="en-US">
										DoLikeEdu may from time to time amend the Terms of Use and
										the amendment will bind you from the first time you access
										DoLikeEdu subsequent to such amendments.
									</p>
								</li>
								<li>
									<p lang="en-US">
										Each phrase, sentence, paragraph and clause in these Terms
										of Use is severable the one from the other, notwithstanding
										the manner in which they may be linked together or grouped
										grammatically and if in terms of any judgement or order any
										phrase, sentence, paragraph or clause, is found to be
										defective or unenforceable for any reason the remaining
										phrases, sentences, paragraphs and clauses, as the case may
										be, shall nevertheless be and continue to be of full force
										and effect.
									</p>
									<ol>
										<li>
											<p lang="en-US">
												A certificate signed by the administrator
												responsible for maintaining DoLikeEdu will be proof
												of the date of publication and content of the
												current version and all previous versions of the
												conditions.
											</p>
										</li>
										<li>
											<p lang="en-US">
												The laws of the Namibia to the Terms of Use.
											</p>
										</li>
										<li>
											<p lang="en-US">
												Any breach by you of the Terms of Use entitles us
												to suspend your access to DoLikeEdu.
											</p>
										</li>
										<li>
											<p lang="en-US">
												The rule of interpretation that a written agreement
												shall be interpreted against the party responsible
												for the drafting or the preparation of the
												agreement shall not apply.
											</p>
										</li>
									</ol>
								</li>
							</ol>
						</li>
					</ol>
				</div>
			</div>
			<div class="space-12"></div>
		</div>
	</div>

	@stop
