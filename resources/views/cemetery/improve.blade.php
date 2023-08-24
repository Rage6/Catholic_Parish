@extends('layouts.master')
  @section('content')
    <div class="historySection sectionBackground section primaryFont">
      <div class="backBttn">
        <a href="{{ route('cemetery.index') }}" style="color:white"><< BACK</a>
      </div>
      <div class="sectionTitle">
        How You Can Help
      </div>
      <div class="helpSection">
        <div>
          We make constant efforts to respect those buried in our cemetery since we still see them as members of our Catholic family. One of these efforts is to regularly improve and update our records of those buried there. You can help us with this in several ways:
        </div>
        <div>
          <div class="helpSubtitle">
            Share Their Stories
          </div>
          <p>
            You can send factual and respectful information about the deceased to the Web Administrator at our <a style="color:gold" href="{{ route('cemetery.contact') }}">contact page</a>. This information should be relatively short, and it should only be about important facts that best represents the deceased person's life. Obituaries are good examples of this. Common information for our records includes:
          </p>
          <ul>
            <li>
              Dates of birth & death
            </li>
            <li>
              Parents
            </li>
            <li>
              Spouse(s) & children
            </li>
            <li>
              Their service to God, family, and/or country
            </li>
            <li>
              Any respectful, lifelong hobbies or passions
            </li>
          </ul>
        </div>
        <div>
          <div class="helpSubtitle">
            Clean Up The Details
          </div>
          <p>
            You can help us clarify some of the discrepancies that have developed within our own records. While reviewing our cemetery's records, we mostly referenced three sources: our hardcopy card list, our <a style="color:gold" href="https://docs.google.com/spreadsheets/d/1XEJgPcC4c8M_owNmYirap50iclKg6PWf4ZV_7d3Yzzg/edit?usp=sharing" target="_blank">digital spreadsheet</a>, and our cemetery's page on <a style="color:gold" href="https://www.findagrave.com/cemetery/1014232/sacred-heart-cemetery" target="_blank">FindAGrave</a>. These sources occasionally conflict with one another.
          </p>
          <p>
            Here is our list of discrepancies that we still need to resolve:
          </p>
          <!-- <div class="dataErrorRow">
            <div>
              William P. Alt
            </div>
            <div>
              Is William P. Alt still alive?
            </div>
          </div> -->
          <div class="dataErrorList">
            <div class="dataErrorRow">
              <div>
                Elizabeth/Elisabeth Best (d. 1860)
              </div>
              <div>
                How is her first name actually spelled? The tombstone and spreadsheet say "Elisabeth", while the hardcopy shows both ways of spelling it.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Jacob Best (d. ?)
              </div>
              <div>
                What is Jacob's actual date of death? The hardcopy initially said "5-4-1867", but this was crossed off and "12-28-1901" was written underneath
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Brannan vs. Brennan vs. Brennen vs. Brennon
              </div>
              <div>
                The similar last names in our records need to be clarified to ensure that our records remain true. Specific names include: Pauline, Robert, Owen, Henrietta, John, and Nettie. Alma is a special case because she also married <a href="https://www.findagrave.com/memorial/90413920/claude-r-ball" target="_blank">Claude Ball</a>, who was buried in Shebly.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Elisabeth Brodman (d. 1868)
              </div>
              <div>
                She is said to be buried here according to FindAGrave, but there is no hardcopy card confirm it. She left her significant estate to Sacred Heart, so she was likely buried here.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                John Brodman (d. 1859)
              </div>
              <div>
                Although we have no card to confirmed that John was buried here, historical documents on FindAGrave gives strong evidence that he was indeed buried here somewhere.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                John Burke (d. 1858)
              </div>
              <div>
                There is no hardcopy card of this man, but <a href="https://www.findagrave.com/memorial/18680829/john-burke" target="_blank">he is on our FindAGrave</a> with a picture of the tombstone. Confirming that the same tombstone is in our cemetery would be enough.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                (Unknown) Burns (d. ?)
              </div>
              <div>
                The hardcopy card of this name is very empty, and it is not in FindAGrave. The only other information on the card it "Grandmother".
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Viola Curran (d. 1886)
              </div>
              <div>
                This person's name is on FindAGrave and is a child of "J and C Curran", but not on any of our cemetery records.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Philomene Finnegan (d. ?)
              </div>
              <div>
                There is a hardcopy card of this person, but it also says “no evidence of her”.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Joseph Fisher (d. 1856)
              </div>
              <div>
                Although there is no hardcopy card about this person, some <a href="https://www.findagrave.com/memorial/214044043/joseph-fisher" target="_blank">evidence on FindAGrave</a> indicates that they were buried here. First, their baptism records indicate that it happened at Sacred Heart. Second, this person did not show up on their census records after that family moved to Michigan.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Frances Gosser (d. 1825/?)
              </div>
              <div>
                There are two names like this in both the cards and the spreadsheet, and they have spouses that match. Besides that, the second name shows no dates or parents. Are these two cards about the same person?
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Teresa Gwirtz (d. 1859)
              </div>
              <div>
                This person is not on the spreadsheet or a hardcopy card, but <a href="https://www.findagrave.com/memorial/13590399/teresa-gwirtz" target="_blank">she is on FindAGrave</a>
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Maria Henicestarb/J. Henige/L. Henge
              </div>
              <div>
                There are several, very similar names that are likely some (or all) duplicates of one another.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Viola Horning (d. 1885)
              </div>
              <div>
                Her name is not found in our records, but she is on <a href="https://www.findagrave.com/memorial/158117950/viola-horning" target="_blank">FindAGrave</a>.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Elizabeth/Maria Hubert (d. 1921)
              </div>
              <div>
                We need to confirm her OFFICIAL full name. <a href="https://www.findagrave.com/memorial/14461741/maria-elizabeth-hubert" target="_blank">FindAGrave</a> only knows “Maria” is part of it, and it has Maria as her first name
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                (Baby Boy) Kurtzman (d. 1915)
              </div>
              <div>
                There is no hardcopy card about an infant like this, in spite of there being one on <a href="https://www.findagrave.com/memorial/211341834/baby_boy-kurtzman" target="_blank">FindAGrave</a>.
              </div>
            </div>
            <!-- <div class="dataErrorRow">
              <div>
                Mary Leich
              </div>
              <div>
                This is a duplicate of Mary Singer on FindAGrave
              </div>
            </div> -->
            <div class="dataErrorRow">
              <div>
                Philip & Philomine Loude
              </div>
              <div>
                Although there are no "Loude" names on the cards or the spreadsheet, their tombstone is included on <a href="https://www.findagrave.com/cemetery/1014232/memorial-search?firstname=&middlename=&lastname=loude&cemeteryName=Sacred+Heart+Cemetery&birthyear=&birthyearfilter=&deathyear=&deathyearfilter=&memorialid=&mcid=&linkedToName=&datefilter=&orderby=r&plot=" target="_blank">FindAGrave</a> with pictures of their tombstones.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                J. McNamara/McNammara
              </div>
              <div>
                It's unclear which name is correct. Only the name McNamara showed up on the hardcopy card, but only McNammara is on <a href="https://www.findagrave.com/memorial/18682965/j-mcnammara" target="_blank">FindAGrave</a>. Based on the tombstone picture, it is McNammara.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Otillia Metzger (x2)
              </div>
              <div>
                Two Otillia Metzgers with different dates appear in FindAGrave (<a href="https://www.findagrave.com/memorial/252730253/otillia-metzger" target="_blank">A</a> and <a href="https://www.findagrave.com/memorial/252720818/ottilia-metzger" target="_blank">B</a>), but neither are on our spreadsheet or hardcopy cards. In further complications, an <a href="https://www.findagrave.com/memorial/14461701/otilla-sutter" target="_blank">"Ottila Sutter"</a> seems to be connected to one of them as well.
              </div>
            </div>
            <!-- <div class="dataErrorRow">
              <div>
                Harold Moore
              </div>
              <div>
                This man's name does not appear in either our spreadsheet or hardcopy cards.
              </div>
            </div> -->
            <div class="dataErrorRow">
              <div>
                Henrietta Brennan/Niebrugge (d. 1901)
              </div>
              <div>
                It looks like our records list her by her maiden name, Henrietta Brennan, and her hardcopy card says that her name is on the back of her parents' tombstone. However, the <a href="https://www.findagrave.com/memorial/126361879/henrietta-niebrugge" target="_blank">FindAGrave entry</a> lists her by her married name, Henrietta Niebrugge. That entry says that she died ~6 months after her marriage with John William Niebrugge.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                John Nolen (d. 1877)
              </div>
              <div>
                This man is not in our records, but is found on <a href="https://www.findagrave.com/memorial/18683332/john-nolen" target="_blank">FindAGrave</a>.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Michael Nolen (d. ?)
              </div>
              <div>
                This man is not in our records, but is found on <a href="https://www.findagrave.com/memorial/18683345/michael-nolen" target="_blank">FindAGrave</a>.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Cathleen R. Rondy (d. 1918)
              </div>
              <div>
                Although Cathleen is on our spreadsheet, she is not on our hardcopy cards or FindAGrave. She was a baby, less than 1 year old, and her father was buried at Sacred Heart, but her mother was buried at the Mansfield Catholic Cemetery
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Fred/Frederick Shill (d. 1886)
              </div>
              <div>
                The hardcopy card and tombstone calls him "Fred", but FindAGrave says "Frederick". Was his official first name "Frederick", while his nickname was "Fred"?
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Theodore Simon I (d. ?)
              </div>
              <div>
                He is not in our hardcopy cards or spreadsheet, but he is on <a href="https://www.findagrave.com/memorial/111202703/theodore-simon" target="_blank">FindAGrave</a>. The author of this entry on FindAGrave says that "a care taker at the Sacred Heart Of Jesus Church Cemetery... claims that Theodore Simon I is buried here".
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Charles Sutter (d. 1904)
              </div>
              <div>
                He has no hardcopy card and is not on the spreadsheet, but he is on <a href="https://www.findagrave.com/memorial/131975655/charles-sutter" target="_blank">FindAGrave</a> (including a picture). He shares a tombstone with Maurice, who was ~12 years old.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                M Sutter
              </div>
              <div>
                A hardcopy card and the spreadsheet confirms that this person is buried here. The first name is unclear. Could it be Monica, since that name is written as a note on its hardcopy card?
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Mary Anna Sutter (d. 1895)
              </div>
              <div>
                There is no hardcopy card matching "Mary Anna Sutter" on <a href="https://www.findagrave.com/memorial/18683493/mary-anna-sutter" target="_blank">FindAGrave</a>, but there is a card and tombstone that matches Anna Mariam of same dates. Are they the same person?
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                (Unknown) Sutter (d. ?)
              </div>
              <div>
                This person is only listed on <a href="https://www.findagrave.com/memorial/18683517/unknown-sutter" target="_blank">FindAGrave</a>, and its notes only say "Wife of Charles Sutter".
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                J T (d. ?)
              </div>
              <div>
                A hardcopy card confirms that this person is buried here, but the card has no facts besides their initials and plot location. In addition to this, the next plot is for "James Tarlton" (according to the cards).
              </div>
            </div>
            <!-- <div class="dataErrorRow">
              <div>
                Mary Ann Tabor
              </div>
              <div>
                This name is only found in hardcopy cards, which indicates that she and her husband were/will be cremated there
              </div>
            </div> -->
            <div class="dataErrorRow">
              <div>
                Catherine Walser (d. ?)
              </div>
              <div>
                This name is not on a hardcopy card or the spreadsheet. However, there is <a href="https://www.findagrave.com/memorial/214001389/catherine-walser" target="_blank">strong evidence on FindAGrave</a> that she was buried here before her family migrated to Michigan.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Mary Walser (d. 1861)
              </div>
              <div>
                Like with Catherine Walser, Mary Walter is not found in the parish records, but other reliable documents indicate that she was buried here. The evidence can be seen at her <a href="https://www.findagrave.com/memorial/182760406/mary-kleophea-walser" target="_blank">FindAGrave page</a>, and a fuller explanation is part of her <a href="https://www.findagrave.com/memorial/150110886/william-walser" target="_blank">son's page</a>.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                John D. Weaver (d. 1880)
              </div>
              <div>
                There are differences between the birth dates and the middle names when comparing parish records and the <a href="https://www.findagrave.com/memorial/18740299/john-daniel-weaver" target="_blank">FindAGrave page</a>. The FindAGrave may be more credible, based on a picture that has the middle name starting with “D”, while the hardcopy card say “E”
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Brigitha Yetzer (d. 1861)
              </div>
              <div>
                She is not in our parish records, but evidence on the <a href="http://yetzerfamilyinamerica.com" target="_blank">Yetzer heritage website</a> indicates that she is buried in our cemetery.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                John & Jessie Zwilling (d. 1954 & 1990)
              </div>
              <div>
                It is unclear whether Jessie and her husband, John, were buried here or at another Catholic church that goes by the name "Sacred Heart" in Pomeroy, OH. Jessie has a card in our records and is on our spreadsheet, but her husband's obituary talks about his burial at the church in Pomeroy. They both have FindAGrave pages at each church, although their Pomeroy pages use the name "Zwillinger". Our pages provide more information, but the Pomeroy pages have actual pictures of the couple's common tombstone. Identifying where the tombstones could prove where the burials actually took place.
                </br>
                Bethlehem: <a href="https://www.findagrave.com/memorial/126489905/jessie-marie-zwillingJessie" target="_blank">Jessie</a> and <a href="https://www.findagrave.com/memorial/198330010/john-leo-zwilling" target="_blank">John</a>
                </br>
                Pomeroy: <a href="https://www.findagrave.com/memorial/95655083/jessie-m-zwillinger" target="_blank">Jessie</a> and <a href="https://www.findagrave.com/memorial/95655116/john-leo-zwillinger" target="_blank">John</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
