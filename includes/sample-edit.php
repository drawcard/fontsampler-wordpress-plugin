<?php if (empty($fonts)): ?>
    <div class="notice">
        <strong class="note">No font files found in the media gallery. Start by
            <a href="?page=fontsampler&amp;subpage=font_create">creating a fontset</a> and uploading its webfont formats.</strong>
    </div>
<?php else: ?>
    <h1><?php echo empty($set['id']) ? "New fontsampler" : "Edit fontsampler " .$set['id'] ?></h1>
    <p>Once you create the fontsampler, it will be saved with an ID you use to embed it on your wordpress pages</p>
    <form method="post" action="?page=fontsampler">
        <input type="hidden" name="action" value="editSet">
        <?php if (!empty($set['id'])): ?>
            <input type="hidden" name="id" value="<?php echo $set['id']; ?>">
        <?php endif; ?>

        <h2>Fonts</h2>
        <p>Pick which font set or sets to use:</p>
        <small>Picking multiple font set will enable the select field for switching between fonts used in the Fontsampler</small>
        <ul id="fontsampler-fontset-list">
            <?php if (!empty($set['id']) && !empty($set['fonts'])): foreach ($set['fonts'] as $existingFont): ?>
            <li>
                <select name="font_id[]">
                    <option value="0">--</option>
                    <?php foreach ($fonts as $font):?>
                        <option <?php if (in_array($existingFont['name'], $font)): echo ' selected="selected"'; endif; ?>
                            value="<?php echo $font['id']; ?>">
                            <?php echo $font['name']; ?>
                        </option>
                    <?php endforeach;?>
                </select>
                <button class="btn btn-small fontsampler-fontset-remove">&minus;</button> <span>Remove this fontset from sampler</span>
            </li>
            <?php endforeach; ?>

            <?php else: ?>
            <li>
                <!-- for a new fontset, display one, non-selected, select choice -->
                <select name="font_id[]">
                    <option value="0">--</option>
                        <?php foreach ($fonts as $font):?>
                            <option value="<?php echo $font['id']; ?>"><?php echo $font['name']; ?></option>
                        <?php endforeach;?>
                </select>
                <button class="btn btn-small fontsampler-fontset-remove">&minus;</button> <span>Remove this fontset from sampler</span>
            </li>
            <?php endif; ?>
        </ul>
        <button class="btn btn-small fontsampler-fontset-add">+</button> <span>Add another fontset to this sampler</span>

        <h2>Options</h2>
        <h3>Interface options</h3>
        <h4>Initial text</h4>
        <label>
            <span>The initial text displayed in the font sampler, for example the font name or pangram.
                You can use multi-line text here as well.</span><br>
            <textarea name="initial" cols="60" rows="5"><?php if (!empty($set['initial'])) echo $set['initial']; ?></textarea>
        </label>
        <div>
            <div class="fontsampler-options-checkbox fontsampler-admin-column-half">
                <h4>Common features</h4>
                <label>
                    <input type="checkbox" name="size" <?php if (!empty($set['size'])) echo ' checked="checked" '; ?>>
                    <span>Size control</span>
                </label>
                <label>
                    <input type="checkbox" name="letterspacing" <?php if (!empty($set['letterspacing'])) echo ' checked="checked" '; ?>>
                    <span>Letter spacing control</span>
                </label>
                <label>
                    <input type="checkbox" name="lineheight" <?php if (!empty($set['lineheight'])) echo ' checked="checked" '; ?>>
                    <span>Line height control</span>
                </label>
                <label>
                    <input type="checkbox" name="fontpicker" <?php if (!empty($set['fontpicker'])) echo ' checked="checked" '; ?>>
                    <span>Display dropdown selection for multiple fonts </span>
                    <small>(this will automatically be hidden if no more than one font are found)</small>
                </label>
                <label>
                    <input type="checkbox" name="sampletexts" <?php if (!empty($set['sampletexts'])) echo ' checked="checked" '; ?>>
                    <span>Display dropdown selection for sample texts</span>
                </label>
                <label>
                    <input type="checkbox" name="alignment" <?php if (!empty($set['alignment'])) echo ' checked="checked" '; ?>>
                    <span>Alignment controls</span>
                </label>
                <label>
                    <input type="checkbox" name="invert" <?php if (!empty($set['invert'])) echo ' checked="checked" '; ?>>
                    <span>Allow inverting the text field to display negative text</span>
                </label>
                <label>

                </label>
                <label>
                    (Coming soon: Allow line breaks on pressing enter)
                </label>
                <label>
                    (Coming soon: rendering intent / anti-aliasing options)
                </label>
            </div>

            <div class="fontsampler-admin-column-half">
                <h4>Opentype options</h4>
                <p>Enable those features only if your fonts support them - the plugin simply offers the interface without
                checking availability.</p>
                <label>
                    <input type="checkbox" name="ot_liga" <?php if (!empty($set['ot_liga'])) echo ' checked="checked" '; ?>>
                    <span>Common ligatures</span>
                </label>
                <label>
                    <input type="checkbox" name="ot_dlig" <?php if (!empty($set['ot_dlig'])) echo ' checked="checked" '; ?>>
                    <span>Discretionary ligatures</span>
                </label>
                <label>
                    <input type="checkbox" name="ot_hlig" <?php if (!empty($set['ot_hlig'])) echo ' checked="checked" '; ?>>
                    <span>Historical ligatures</span>
                </label>
                <label>
                    <input type="checkbox" name="ot_calt" <?php if (!empty($set['ot_calt'])) echo ' checked="checked" '; ?>>
                    <span>Contextual alternates</span>
                </label>
                <hr>
                <label>
                    <input type="checkbox" name="ot_frac" <?php if (!empty($set['ot_frac'])) echo ' checked="checked" '; ?>>
                    <span>Fractions</span>
                </label>
                <label>
                    <input type="checkbox" name="ot_sups" <?php if (!empty($set['ot_sups'])) echo ' checked="checked" '; ?>>
                    <span>Superscript</span>
                </label>
                <label>
                    <input type="checkbox" name="ot_subs" <?php if (!empty($set['ot_subs'])) echo ' checked="checked" '; ?>>
                    <span>Subscript</span>
                </label>
            </div>
        </div>
        <h3>Css options</h3>
        <p>(not implemented yet: custom styling for font samplers)</p>
        <?php submit_button(); ?>
    </form>
<?php endif; ?>